<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Admin</title>
    @include('templates.cdn-link')

    <!--Vendor CSS Files-->
    <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet')}}">
    <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!--Main CSS File-->
    <link href="{{asset('assets/css/login-style.css')}}" rel="stylesheet">

    <style>
        @font-face {
            font-family: Poppins;
            src: url("{{asset('assets/fonts/Poppins-Regular.ttf')}}");
        }
        body {
            font-family: 'Poppins', sans-serif;
            font-weight: 300;
            font-size: 15px;
            line-height: 1.7;
            color: #c4c3ca;
            background-color: rgba(0,0,0,0.5);
            background-image: url("{{asset('/assets/img/login/millennium-rin.png')}}");
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            overflow-x: hidden;
        }
        a {
            cursor: pointer;
            transition: all 200ms linear;
        }
        a:hover {
            text-decoration: none;
        }
        p {
            font-weight: 500;
            font-size: 14px;
            line-height: 1.7;
        }
        h4 {
            color: #000;
            font-weight: 600;
        }
        .full-height {
            min-height: 100vh;
        }
        [type="checkbox"]:checked,
        [type="checkbox"]:not(:checked) {
            position: absolute;
            left: -9999px;
        }
        .checkbox:checked + label,
        .checkbox:not(:checked) + label {
            position: relative;
            display: block;
            text-align: center;
            width: 60px;
            height: 16px;
            border-radius: 8px;
            padding: 0;
            margin: 10px auto;
            cursor: pointer;
            background-color: #9BA4B5;
        }
        .checkbox:checked + label:before,
        .checkbox:not(:checked) + label:before {
            position: absolute;
            display: block;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            color: #fff;
            background-color: #102770;
            font-family: 'bootstrap-icons', serif;
            content: '\F116';
            z-index: 20;
            top: -10px;
            left: -10px;
            line-height: 36px;
            text-align: center;
            font-size: 24px;
            transition: all 0.5s ease;
        }
        .checkbox:checked + label:before {
            transform: translateX(44px) rotate(360deg);
            content: '\F117';
        }
        .card-3d-wrap {
            position: relative;
            width: 440px;
            max-width: 100%;
            height: 400px;
            -webkit-transform-style: preserve-3d;
            transform-style: preserve-3d;
            perspective: 800px;
            margin-top: 60px;
        }
        .card-3d-wrapper {
            border: 2px solid #1D267D;
            border-radius:8px;
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            -webkit-transform-style: preserve-3d;
            transform-style: preserve-3d;
            transition: all 600ms ease-out;
        }
        .card-front, .card-back {
            width: 100%;
            height: 100%;
            background-color: #B0DAFF;
            background-image: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/1462889/pat.svg');
            background-position: bottom center;
            background-repeat: no-repeat;
            background-size: 300%;
            position: absolute;
            border-radius: 6px;
            left: 0;
            top: 0;
            -webkit-transform-style: preserve-3d;
            transform-style: preserve-3d;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
        }
        .card-back {
            transform: rotateY(180deg);
        }
        .checkbox:checked ~ .card-3d-wrap .card-3d-wrapper {
            transform: rotateY(180deg);
        }
        .center-wrap {
            position: absolute;
            width: 100%;
            padding: 0 35px;
            top: 50%;
            left: 0;
            transform: translate3d(0, -50%, 35px) perspective(100px);
            z-index: 20;
            display: block;
        }

        .form-group {
            position: relative;
            display: block;
            margin: 0;
            padding: 0;
        }

        .input-icon {
            position: absolute;
            top: 0;
            left: 18px;
            height: 48px;
            font-size: 24px;
            line-height: 48px;
            text-align: left;
            color: #ffeba7;
            -webkit-transition: all 200ms linear;
            transition: all 200ms linear;
        }

        .form-group input:-ms-input-placeholder {
            color: #c4c3ca;
            opacity: 0.7;
            -webkit-transition: all 200ms linear;
            transition: all 200ms linear;
        }

        .form-group input::-moz-placeholder {
            color: #c4c3ca;
            opacity: 0.7;
            -webkit-transition: all 200ms linear;
            transition: all 200ms linear;
        }

        .form-group input:-moz-placeholder {
            color: #c4c3ca;
            opacity: 0.7;
            -webkit-transition: all 200ms linear;
            transition: all 200ms linear;
        }

        .form-group input::-webkit-input-placeholder {
            color: #c4c3ca;
            opacity: 0.7;
            -webkit-transition: all 200ms linear;
            transition: all 200ms linear;
        }

        .form-group input:focus:-ms-input-placeholder {
            opacity: 0;
            -webkit-transition: all 200ms linear;
            transition: all 200ms linear;
        }

        .form-group input:focus::-moz-placeholder {
            opacity: 0;
            -webkit-transition: all 200ms linear;
            transition: all 200ms linear;
        }

        .form-group input:focus:-moz-placeholder {
            opacity: 0;
            -webkit-transition: all 200ms linear;
            transition: all 200ms linear;
        }

        .form-group input:focus::-webkit-input-placeholder {
            opacity: 0;
            -webkit-transition: all 200ms linear;
            transition: all 200ms linear;
        }

        .btn {
            border-radius: 4px;
            height: 44px;
            font-size: 13px;
            font-weight: 600;
            -webkit-transition: all 200ms linear;
            transition: all 200ms linear;
            padding: 0 30px;
            letter-spacing: 1px;
            display: -webkit-inline-flex;
            display: -ms-inline-flexbox;
            display: inline-flex;
            -webkit-align-items: center;
            align-items: center;
            -webkit-justify-content: center;
            justify-content: center;
            -ms-flex-pack: center;
            text-align: center;
            border: none;
            background-color: #1D267D;
            color: #fff;
            box-shadow: 0 8px 24px 0 rgba(255, 235, 167, .2);
        }
        .btn:hover {
            background-color: #ecd640;
            color: #000000;
            box-shadow: 0 8px 24px 0 rgba(51, 89, 211, 0.2);
        }
        #login-error{
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
        }
    </style>
</head>
<body>

<div class="section">
    <div class="container">
        <div class="row full-height justify-content-center">
            <div class="col-12 text-center align-self-center py-5">
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
                <div class="section pb-5 pt-5 pt-sm-2 text-center">
                    <div class="card-3d-wrap mx-auto">
                        <div class="card-3d-wrapper">
                            <div class="card-front">
                                <form method="post" action="/schale-auth" id="admin">
                                    @csrf
                                    <div class="center-wrap">
                                        <div class="section text-center">
                                            <h4 class="mb-4 pb-3">Login Admin</h4>
                                            <div class="form-group">
                                                <input type="text" name="username" class="form-control" placeholder="Masukkan username" id="nama" autocomplete="off">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var loginErrorToast = document.getElementById('login-error');
        if (loginErrorToast) {
            var bsToast = new bootstrap.Toast(loginErrorToast);
            bsToast.show();
        }
    });

    function togglePasswordVisibility() {
        let passwordInput = document.getElementById('pass-sensei');
        let passwordToggle = document.getElementById('password-toggle-sensei');

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            passwordToggle.innerHTML = '<i class="bi bi-eye-slash"></i>';
        } else {
            passwordInput.type = "password";
            passwordToggle.innerHTML = '<i class="bi bi-eye"></i>';
        }
    }
    function togglePasswordVisibility2() {
        let passwordInput = document.getElementById('pass-sekretaris');
        let passwordToggle = document.getElementById('password-toggle-sekretaris');

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            passwordToggle.innerHTML = '<i class="bi bi-eye-slash"></i>';
        } else {
            passwordInput.type = "password";
            passwordToggle.innerHTML = '<i class="bi bi-eye"></i>';
        }
    }
</script>

<script>
    $(document).ready(function () {
        $('#login').click(function (event) {
            event.preventDefault();
        });
    });
    function resetSenseiForm() {
        document.getElementById("sensei").reset();
    }
    function resetSekretarisForm() {
        document.getElementById("sekretaris").reset();
    }
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("sensei").addEventListener("focusin", resetSekretarisForm);
        document.getElementById("sekretaris").addEventListener("focusin", resetSenseiForm);
    });
</script>
<!--Vendor JS File-->
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="{{asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
<script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
<script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
<!--Main JS File-->
<script src="{{asset('assets/js/main.js')}}"></script>

