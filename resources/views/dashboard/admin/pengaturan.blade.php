@extends('dashboard.layouts.home_layouts')
@section('title', 'My Profile')
@section('pengaturan', 'active')

@section('content')

    <div class="container">
        <div class="content-header">
            @if (session('msg'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Pesan!</h5>
                    {{ session('msg') }}
                </div>
            @endif
            <div class="row">


                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Alamat</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('pengaturan/updateAlamat') }}" method="POST">
                            @csrf
                            @method('put')
                            <input type="number" name="idAlamat" value="{{ $almat->id }}" hidden>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="fakultas">Fakultas/Universitas</label>
                                    <input type="text" class="form-control" id="fakultas"
                                        value="{{ $almat->fakultas_univ }}" name="fakultas"
                                        placeholder="Fakultas Atau Universitas">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" name="alamat" id="alamat" cols="20" rows="4" placeholder="Alamat">{{ $almat->alamat }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="nomor">Nomor Telepon</label>
                                    <input type="text" class="form-control" id="nomor"
                                        value="{{ $almat->nomor_telepon }}" name="nomor" placeholder="Nomor">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" value="{{ $almat->email }}"
                                        name="email" placeholder="Email">
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update Alamat</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->


                </div>
                <div class="col-md-6">
                    <!-- Form Element sizes -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Harga</h3>
                        </div>

                        <form action="{{ route('pengaturan/updateHarga') }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label>Jenis Berkas<span class="text-red">*</span></label>
                                    <select
                                        class="form-control   @error('berkas')
                                    is-invalid
                                   @enderror"
                                        id="berkas" name="berkas">
                                        <option value="" selected disabled>silahkan pilih</option>
                                        @foreach ($harga as $key => $value)
                                            <option value="{{ $value->id }}">
                                                {{ $value->nama_berkas }}</option>
                                        @endforeach


                                    </select>
                                    @error('berkas')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Harga</label>
                                    <input class="form-control" type="text" id="price" name="price"
                                        placeholder="Harga">
                                    <input class="form-control" type="number" id="id" name="id" hidden>
                                </div>


                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Update Harga</button>
                            </div>
                        </form>
                        <!-- /.card-body -->
                    </div>


                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#berkas").change(function() {

                let berkas_id = $(this).val()

                $.ajax({
                    type: 'get',
                    url: '{{ route('getHarga') }}',
                    data: {
                        'id': berkas_id
                    },
                    success: function(data) {
                        $('#price').val(data.harga_perlembar)
                        $('#id').val(data.id)
                    },
                    error: function() {

                    }
                })
            });

        })
    </script>

@endsection
