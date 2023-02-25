@extends('dashboard.layouts.home_layouts')
@section('title', 'Dashboard')
@section('dashboard', 'active')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h1>Selamat Datang {{ $user->name }}</h1>
        </div>
    </div>


@endsection
