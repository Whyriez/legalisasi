@extends('dashboard.layouts.home_layouts')
@section('title', 'My Profile')

@section('content')

    <div class="container">
        <div class="content-header">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">

                        <img class="profile-user-img img-fluid img-circle" src="{{ asset('storage/' . $user->profile) }}"
                            alt="User profile picture" style="width: 9rem; height:9rem;">

                    </div>
                    <form action="profile/update" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <input type="text" name="id" value="{{ $user->id }}" hidden>
                        <center>
                            <div class="text-center col-5">
                                <div class="custom-file text-center mt-3 mb-2">
                                    <input
                                        class="custom-file-input  @error('profile')
                                    is-invalid
                                   @enderror""
                                        name="profile" id="profile" type="file">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                    @error('profile')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </center>
                        <h3 class="profile-username text-center">{{ $user->name }}</h3>


                        <center>
                            <div class="col-5">
                                <button type="submit" class="btn btn-primary btn-block"><b>Update Profile</b></button>
                                <a href="profile/hapus/{{ $user->id }}" class="btn btn-danger mt-3">Hapus Profile</a>
                            </div>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection
