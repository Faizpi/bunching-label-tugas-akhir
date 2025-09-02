<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use Validator;

class UserController extends Controller
{
    public function index(Request $req) {
        $users = User::orderBy('id', 'desc');

        $role = !is_null($req->role) || $req->role === 0;
        $search = !is_null($req->search) || $req->search === 0;

        if($role) {
            $users = $users->where('role', $req->role);
        }

        if($search) {
            $users = $users->where('nsk', 'like', '%'.$req->search.'%');
        }
        
        $users = $users->paginate(10);
        return view('web.user.index', [
            'users' => $users,
        ]);
    }

    public function create() {
        return view('web.user.create');
    }

    public function insert(Request $req) {
        $validate = Validator::make($req->all(), [
            'name' => 'required',
            'nsk' => 'required|unique:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required_with:password',
            'role' => 'required',
        ], [
            'nsk.unique' => 'NSK telah digunakan',
            'password.confirmed' => 'Password konfirmasi tidak sama'
        ]);

        if($validate->fails()) {
            return back()->withInput()->withErrors($validate->errors());
        }

        $params = $req->all();
        $params['password'] = Hash::make($req->password);
        User::create($params);

        return redirect()->route('web.user.index');
    }

    public function edit(User $user) {
        return view('web.user.edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $req, User $user) {
        $validate = Validator::make($req->all(), [
            'name' => 'required',
            'nsk' => 'required|unique:users,id,'. $user->id,
            'password' => 'sometimes|confirmed',
            'password_confirmation' => 'required_with:password',
            'role' => 'required',
        ], [
            'nsk.unique' => 'NSK telah digunakan',
            'password.confirmed' => 'Password konfirmasi tidak sama'
        ]);

        if($validate->fails()) {
            return back()->withInput()->withErrors($validate->errors());
        }

        $params = $req->except('password');

        if ($req->password) {
            $params['password'] = Hash::make($req->password);
        }

        $user->update($params);

        return redirect()->route('web.user.index');
    }

    public function delete(User $user) {
        $user->delete();

        return redirect()->route('web.user.index');
    }

    public function detail(User $user) {
        return view('web.user.detail', compact('user'));
    }

    public function bulkImport(User $user) {
        return view('web.user.import');
    }

    public function import(Request $req) {
        $path = \Storage::disk('candidate')->put('', $req->file('excel'));
        $path  = \Storage::disk('candidate')->path($path);

        $collection = \Excel::import(new \App\Imports\UsersImport, $path);

        return redirect()->route('web.user.index');
    }
}
