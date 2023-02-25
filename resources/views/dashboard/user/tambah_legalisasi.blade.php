@extends('dashboard.layouts.home_layouts')
@section('title', 'Legaisasi')
@section('tambah_legalisasi', 'active')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="col-lg-12">

                @if (session('msg'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Pesan!</h5>
                        {{ session('msg') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Tambah Pengajuan Legalisasi</h5>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <form action="/tambah_legalisasi/simpan" method="POST" id="show" enctype="multipart/form-data">
                        @csrf

                        <input type="text" name="nama" value="{{ $user->name }}" hidden>
                        <input type="text" name="nim" value="{{ $user->nim }}" hidden>
                        <div class="card-body" id="penjualan">
                            <div class="form-group">
                                <label for="exampleInputFile">Unggah Berkas<span class="text-red">*</span></label>
                                <div
                                    class="input-group @error('files')
                                is-invalid
                               @enderror">
                                    <div class="custom-file">
                                        <input type="file" name="files"
                                            class="custom-file-input @error('files')
                                        is-invalid
                                       @enderror"
                                            id="files">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                                @error('files')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <p class="text-gray ml-1">maksimal upload 2MB format PDF/JPG/PNG</p>

                            </div>

                            <div class="form-group">
                                <label>Jenis Berkas<span class="text-red">*</span></label>
                                <select
                                    class="form-control   @error('berkas')
                                is-invalid
                               @enderror"
                                    name="berkas" id="berkas">
                                    <option value="" selected disabled>silahkan pilih</option>
                                    <option value="Ijazah" @if (old('berkas') == 'Ijazah') {{ 'selected' }} @endif>
                                        Ijazah</option>
                                    <option value="Khs" @if (old('berkas') == 'Khs') {{ 'selected' }} @endif>Khs
                                    </option>
                                </select>
                                @error('berkas')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label>Jumlah<span class="text-red">*</span></label>
                                <select
                                    class="form-control   @error('jumlah')
                                is-invalid
                               @enderror"
                                    name="jumlah" id="jumlah" onChange="sum()">
                                    <option value="" selected disabled>silahkan pilih</option>
                                    <option value="1" @if (old('jumlah') == '1') {{ 'selected' }} @endif>1
                                    </option>
                                    <option value="2" @if (old('jumlah') == '2') {{ 'selected' }} @endif>2
                                    </option>
                                    <option value="3" @if (old('jumlah') == '3') {{ 'selected' }} @endif>3
                                    </option>
                                    <option value="4" @if (old('jumlah') == '4') {{ 'selected' }} @endif>4
                                    </option>
                                    <option value="5" @if (old('jumlah') == '5') {{ 'selected' }} @endif>5
                                    </option>
                                    <option value="6" @if (old('jumlah') == '6') {{ 'selected' }} @endif>6
                                    </option>
                                    <option value="7" @if (old('jumlah') == '7') {{ 'selected' }} @endif>7
                                    </option>
                                    <option value="8" @if (old('jumlah') == '8') {{ 'selected' }} @endif>8
                                    </option>
                                    <option value="9" @if (old('jumlah') == '9') {{ 'selected' }} @endif>9
                                    </option>
                                    <option value="10" @if (old('jumlah') == '10') {{ 'selected' }} @endif>
                                        10</option>
                                </select>
                                @error('jumlah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <input type="text" name="price" id="price"
                                value="{{ $ijazah->harga_perlembar ?? '' }}" onblur="sum()" hidden>

                            <div class="mb-2">
                                <label for="ambil">Ambil Berkas<span class="text-red">*</span></label>
                                <div
                                    class="@error('check')
                                is-invalid
                               @enderror">
                                    <div class="form-check">
                                        <input
                                            class="form-check-input   @error('check')
                                    is-invalid
                                   @enderror"
                                            value="Fakultas/Sekolah" checked name="check" type="radio"
                                            id="flexRadioDefault1" onclick="text(0)">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Ambil Di Fakultas/Sekolah
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input
                                            class="form-check-input   @error('check')
                                    is-invalid
                                   @enderror"
                                            value="Dikirim" @if (old('check') && 'Dikirim' == old('check')) checked @endif
                                            name="check" type="radio" id="dikirim" onclick="text(1)">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Dikirim
                                        </label>
                                    </div>
                                </div>
                                @error('check')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>



                            <div class="form-group" id="kopos" style="display: none">
                                <label for="pos">Kode Pos<span class="text-red">*</span></label>
                                <input type="text"
                                    class="form-control   @error('pos')
                                is-invalid
                               @enderror"
                                    name="pos" value="{{ old('pos') }}" id="pos" placeholder="Kode Pos">
                                @error('pos')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group" name="alamataa" id="alamataa" style="display: none">
                                <label for="textarea">Alamat Pengiriman<span class="text-red">*</span></label>
                                <textarea type="text"
                                    class="form-control   @error('alamat')
                                is-invalid
                               @enderror"
                                    name="alamat" rows="5" id="alamat_area" placeholder="Alamat Pengiriman">{{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="biaya">Biaya Legalisasi<span class="text-red">*</span></label>
                                <input type="text"
                                    class="form-control   @error('biaya')
                                is-invalid
                               @enderror"
                                    name="biaya" id="biaya" value="{{ old('biaya') }}" placeholder="0" readonly>
                                @error('biaya')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group" id="tape" style="display: none">
                                <label for="tarif">Tarif Pengiriman<span class="text-red">*</span></label>
                                <input type="text"
                                    class="form-control   @error('tarif')
                                is-invalid
                               @enderror"
                                    name="tarif" value="{{ old('tarif') }}" placeholder="0">
                                @error('tarif')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="textarea">Catatan</label>
                                <textarea type="text" class="form-control" name="catatan" rows="5" placeholder="Catatan">{{ old('catatan') }}</textarea>
                            </div>

                            <script>
                                function sum() {
                                    var val_1 = document.getElementsByName('jumlah')[0].value;
                                    var val_2 = document.getElementsByName('price')[0].value;
                                    var sum = Number(val_1) * Number(val_2);
                                    document.getElementsByName('biaya')[0].value = sum;
                                    if (isNaN(sum)) {
                                        document.getElementsByName('biaya')[0].value = 0;
                                    }
                                }

                                function text(x) {
                                    if (x == 1) {
                                        document.getElementById("alamataa").style.display = "block";
                                        document.getElementById("kopos").style.display = "block";
                                        document.getElementById("tape").style.display = "block";
                                        setRequired(true);
                                    } else if (x == 0) {
                                        document.getElementById("alamataa").style.display = "none";
                                        document.getElementById("kopos").style.display = "none";
                                        document.getElementById("tape").style.display = "none";
                                        setRequired(false);
                                    }
                                    return;
                                }

                                function setRequired(val) {
                                    input = document.getElementById("show").getElementsByTagName('input');
                                    textarea = document.getElementById("alamat_area");
                                    for (i = 0; i < input.length; i++) {
                                        input[i].required = val;
                                        textarea.required = val;
                                    }

                                }

                                $(document).ready(function() {
                                    $("#berkas").change(function() {

                                        let nama = $(this).val()
                                        if (nama == 'Ijazah') {
                                            document.getElementsByName('price')[0].value = {{ $ijazah->harga_perlembar }}
                                            document.getElementsByName('biaya')[0].value = 0
                                            document.getElementsByName('jumlah')[0].value = 0
                                        } else {
                                            document.getElementsByName('price')[0].value = {{ $khs->harga_perlembar }}
                                            document.getElementsByName('biaya')[0].value = 0
                                            document.getElementsByName('jumlah')[0].value = 0
                                        }
                                    });

                                })
                            </script>


                        </div>
                        <!-- /.card-body -->



                        <div class="card-footer">
                            <a href="{{ url('legalisasi') }}" class="btn btn-warning float-left">Kembali</a>
                            <button type="submit" class="btn btn-primary float-right">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection
