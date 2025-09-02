<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use App\User;

class AuthController extends Controller
{
    public function login() {
        if(\Auth::check()) {
            return redirect()->route('web.dashboard.index');
        }

        return view('web.auth.login');
    }

    public function signin(Request $req) {
        $validate = Validator::make($req->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validate->fails())
            return back()->withInput()->withErrors($validate->errors());
        
        $credential = [
            'nsk' => $req->email,
            'password' => $req->password
        ];
        if(!Auth::attempt($credential)) {
            return back()->withInput()->withErrors(['error' => ['NSK or Password is Invalid']]);
        }

        return redirect()->route('web.dashboard.index');
    }

    public function signout() {
        Auth::logout();

        return redirect()->route('web.index');
    }
}
