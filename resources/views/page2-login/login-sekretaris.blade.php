@extends('templates.login-form')

@section('tittle')
    <title>Millennium School : Login Sekretaris</title>
@endsection

@section('form')
    <form method="post" action="/sekretaris-auth" id="sekretaris">
        @csrf
        <div class="center-wrap">
            <div class="section text-center">
                <h4 class="mb-4 pb-3">Login Sekretaris</h4>
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

