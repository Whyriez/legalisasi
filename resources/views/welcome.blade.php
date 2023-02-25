<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href="{{ \URL::to('/') }}">
    <link rel="stylesheet" href="auth/register.css">

    <title>Welcome</title>
</head>



<body>
    <div class="container" id="container">
        <div class="overlay-container-top">
            <div class="text-top">
                <span class="head-h1">Selamat Datang</span>
                <span class="head-res">di halaman utama legalisasi online Fakultas Teknik, Universitas Negeri Gorontalo.
                    <br> Buat
                    Legalisasi Online
                    untuk berkas anda.</span>
            </div>
        </div>

        <div class="form-container sign-in-container-right">
            <div class="landing">
                <h1>Buat Legalisasi</h1>
                <span>Silahkan klik tombol dibawah untuk membuat legalisasi online anda</span>
                <a href="{{ route('login') }}" class="buat" style="margin-top:10px;">Buat Legalisasi</a>

            </div>
        </div>
        <div class="overlay-container-right">
            <div class="overlay-kiri">
                <div class="overlay-panel overlay-left">
                    <h1>Selamat Datang</h1>
                    <p>di halaman utama legalisasi online Fakultas Teknik, Universitas Negeri Gorontalo. <br> Buat
                        Legalisasi Online
                        untuk berkas anda.</p>

                </div>
                <div class="footer">
                    <strong>Copyright &copy
                        <script>
                            document.write(new Date().getFullYear())
                        </script> <a href="#" class="univ">Fakultas Teknik, Universitas Negeri
                            Gorontalo</a>
                    </strong>
                </div>
            </div>
        </div>

    </div>





</body>

</html>
