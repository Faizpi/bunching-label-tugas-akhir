@extends('layout.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 bg-light p-5">
            <h3 class="text-center">{{config('app.name')}}</h3>
        </div>
    </div>


    @if(!\Auth::check())
        <div class="row">
            <div class="col-12 col-md-4 offset-md-4 mt-5">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                @if($errors->any())
                                    <div class="alert alert-danger" role="alert">
                                        {{$errors->first()}}
                                    </div>
                                @endif
                                <h3 class="card-title text-center mb-3">Login Anggota</h3>

                                <form method="POST" action="{{route('web.login')}}">
                                    {{ csrf_field() }}
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Username Anggota" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password Akun" required>
                                    </div>
                                    <div class="d-grid gap-1">
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-12 col-md-10 offset-md-1 mt-5">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                @if(\Auth::user()->isAdmin())
                                    <h2 class="text-center">Untuk melakukan pemilihan silahkan login dengan akun Anggota</h2>
                                @else
                                    <h2 class="text-center">Untuk melakukan pemilihan silahkan masuk <a class="btn btn-link" href="{{route('web.voting')}}">Ke Sini</a></h2>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection