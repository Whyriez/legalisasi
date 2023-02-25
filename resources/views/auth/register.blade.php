<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href="{{ \URL::to('/') }}">
    <link rel="stylesheet" href="auth/register.css">

    <title>Register</title>
</head>



<body>
    <div class="container" id="container">
        <div class="form-container">

            <form action="{{ url('proses_register') }}" method="post">
                @csrf
                <h1>Buat Akun</h1>

                <span>gunakan nim anda untuk registrasi</span>
                <div class="lebar">
                    <input type="number"
                        class="@error('nim')
                    is-invalid
                   @enderror" name="nim"
                        placeholder="Nim" value="{{ old('nim') }}" />
                    @error('nim')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <input type="text"
                        class="@error('nama')
                    is-invalid
                   @enderror"
                        name="nama" placeholder="Nama" value="{{ old('nama') }}" />
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <input type="password"
                        class="@error('password1')
                    is-invalid
                   @enderror"
                        name="password1" placeholder="Password" />
                    @error('password1')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <input type="password"
                        class="@error('password2')
                    is-invalid
                   @enderror"
                        name="password2" placeholder="Konfirmasi Password" />
                    @error('password2')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="regis_btn" style="margin-top:10px;">Buat</button>
                <div class="slice">
                    <span>Sudah mempunyai akun? <a href="{{ url('login') }}">Login</a></span>
                </div>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">

                <div class="overlay-panel overlay-right">
                    <h1>Selamat Datang</h1>
                    <p>Masukkan identitas personal anda dan silahkan login</p>
                    <a href="{{ url('login') }}"><button class="ghost" id="signUp">Login</button></a>

                </div>
            </div>
        </div>
    </div>



</body>

</html>
