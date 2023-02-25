<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href="{{ \URL::to('/') }}">
    <link rel="stylesheet" href="auth/register.css">

    <title>Login</title>
</head>



<body>
    <div class="container" id="container">
        <div class="form-container sign-in-container-right">

            <form action="{{ url('proses_login') }}" method="post">
                @csrf
                @if (session('success'))
                    <div class="success-msg">
                        <i class="fa fa-check"></i>
                        {{ session('success') }}
                    </div>
                @endif

                <h1>Masuk</h1>
                <span>dengan menggunakan akun anda</span>
                <input type="text"
                    class="input-group @error('nim')
                is-invalid
               @enderror"
                    placeholder="Nim" name="nim" value="{{ old('nim') }}" />
                @error('nim')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <input type="password"
                    class="input-group @error('password')
                is-invalid
               @enderror"
                    name="password" placeholder="Password" />
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <button style="margin-top:10px;">Masuk</button>
                <div class="slice">
                    <span>Belum mempunyai akun? <a href="{{ url('register') }}">Buat Akun</a></span>
                </div>
            </form>
        </div>
        <div class="overlay-container-right">
            <div class="overlay-kiri">
                <div class="overlay-panel overlay-left">
                    <h1>Selamat Datang</h1>
                    <p>Silahkan buat akun anda untuk masuk ke halaman pembuatan legalisasi</p>
                    <a href="{{ url('register') }}"><button class="ghost" id="signUp">Buat Akun</button></a>
                </div>
            </div>
        </div>

    </div>





</body>

</html>


{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in (v2)</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="{{ url('proses_login') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input autofocus type="text" name="nim"
                            class="form-control 
                        @error('nim')
                         is-invalid
                        @enderror
                        "
                            placeholder="Nim" value="{{ old('nim') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>

                        @error('nim')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password"
                            class="form-control
                        @error('password')
                            is-invalid 
                        @enderror
                        "
                            placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <p class="mb-0">
                    <a href="{{ url('register') }}" class="text-center">Register a new membership</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html> --}}
