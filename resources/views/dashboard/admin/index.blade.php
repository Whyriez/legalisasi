@extends('dashboard.layouts.home_layouts')
@section('title', 'Dashboard')
@section('dashboard', 'active')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <h1>Selamat Datang {{ $user->name }}</h1>
            <div class="row mt-3">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $mahasiswa }}</h3>

                            <p>Total Mahasiswa</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $diterima }}</h3>

                            <p>Legalisasi Yang Sudah Diterima</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3 class="text-white">{{ $belum_diterima }}</h3>

                            <p class="text-white">Legalisasi Yang Belum Diterima</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $belum_ada_bukti }}</h3>

                            <p>Legalisasi Yang Belum Mengirim Bukti</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection
