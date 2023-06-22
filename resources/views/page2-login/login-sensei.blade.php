@extends('templates.login-form')

@section('tittle')
    <title>Millennium School : Login Sensei</title>
@endsection
@section('warning')
    @if(session()->has('loginError'))
        <div class="toast align-items-center text-bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true" id="login-error">
            <div class="d-flex">
                <div class="toast-body">
                    Username atau Password yang anda masukkan salah!
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    @endif
    @error('username')
    <div class="toast align-items-center text-bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true" id="login-error">
        <div class="d-flex">
            <div class="toast-body">
                Minimal masukin username lah bodoh!
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
    @enderror
    @error('password')
    <div class="toast align-items-center text-bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true" id="login-error">
        <div class="d-flex">
            <div class="toast-body">
                Password kau bodoh!
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
    @enderror
@endsection
@section('form')
    <form method="post" action="/sensei-auth" id="sensei">
        @csrf
        <div class="center-wrap">
            <div class="section text-center">
                <h4 class="mb-4 pb-3">Login Sensei</h4>
                <div class="form-group">
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Masukkan username" id="nama" autocomplete="off" value="{{old('username')}}">
                    <i class="input-icon uil uil-at"></i>
                </div>
                <div class="form-group mt-2">
                    <div class="input-group">
                        <input type="password" name="password" class="form-control" placeholder="Masukkan password" id="pass-sensei" autocomplete="off">
                        <button class="btn btn-outline-secondary" type="button" id="password-toggle-sensei" onclick="togglePasswordVisibility()"><i class="bi bi-eye"></i></button>
                    </div>
                </div>
                <button type="submit" class="btn mt-4" name="submit" value="sensei">LOGIN</button>
            </div>
        </div>
    </form>
@endsection
