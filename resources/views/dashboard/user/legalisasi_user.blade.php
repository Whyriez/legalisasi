@extends('dashboard.layouts.home_layouts')
@section('title', 'Legaisasi')
@section('legalisasi', 'active')

@section('content')
    <div class="content-header">
        <blockquote>
            <h2>INFORMASI</h2>
            <p>Biaya Legalisir yang telah ditetapkan adalah :
                <br>
                @foreach ($ijazah as $key => $value)
                    <span class="font-weight-bold">{{ $value->nama_berkas }} : Rp.
                        {{ $value->harga_perlembar }}.00/lembar</span><br>
                @endforeach
            </p>
        </blockquote>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Legalisasi jarak jauh/Distanced Legalization</h5>
                    <a href="{{ url('tambah_legalisasi') }}" class="btn btn-primary btn-sm float-right">Tambah Pengajuan
                        Legalisasi</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered ">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Dokumen</th>
                                <th>Pengambilan</th>
                                <th>Jumlah Bayar</th>
                                <th>Detail</th>
                                <th>Konfirmasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp

                            @foreach ($data as $key => $value)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $value->jenis_dokumen }}
                                    </td>
                                    <td>{{ $value->pengambilan }}</td>
                                    <td>Rp. {{ $value->jumlah_bayar }}</td>
                                    <td class="text-center">
                                        <button type="button" data-toggle="modal"
                                            data-target="#exampleModal{{ $value->id }}"
                                            class="btn-sm btn btn-primary">Detail</button>

                                    </td>
                                    <td class="text-center">
                                        @if ($value->is_upload == 0)
                                            <a role="button" data-toggle="collapse"
                                                data-target="#collapseExample{{ $value->id }}"
                                                class="btn-sm btn btn-warning text-white">Konfirmasi
                                                Pembayaran</a>

                                            <div class="collapse" id="collapseExample{{ $value->id }}">

                                                <form action="/legalisasi/upload" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('put')
                                                    <input type="text" name="id" value="{{ $value->id }}"
                                                        hidden>
                                                    <div
                                                        class="form-group  @error('files')
                                                    is-invalid
                                                   @enderror">
                                                        <input type="file" name="bukti"
                                                            class="form-control-file form-control-sm" id="bukti">
                                                        <p class="text-sm text-gray">maksimal upload 2MB format PDF/JPG/PNG
                                                        </p>
                                                        <button type="submit"
                                                            class="btn btn-primary btn-sm float-right">Unggah</button>
                                                    </div>
                                                    @error('bukti')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </form>
                                            </div>
                                        @elseif($value->is_confirm == 1)
                                            <span class="btn btn-success btn-sm">Bukti Anda Sudah Dikonfirmasi</span>
                                        @else
                                            <button class="btn btn-info btn-sm" type="button" data-toggle="collapse"
                                                data-target="#collapseExample2{{ $value->id }}" aria-expanded="false"
                                                aria-controls="collapseExample2">
                                                Menunggu
                                                Konfirmasi
                                            </button>

                                            <div class="collapse" id="collapseExample2{{ $value->id }}">
                                                <form action="legalisasi/show" method="POST">
                                                    @csrf
                                                    @method('get')
                                                    <input type="text" name="urlbukti"
                                                        value="{{ $value->file_konfirmasi }}" hidden>
                                                    <button type="submit"
                                                        class="btn-sm btn btn-warning text-white mt-2">Lihat
                                                        Bukti
                                                        Konfirmasi
                                                        Pembayaran</button>
                                                </form>

                                            </div>
                                        @endif

                                    </td>
                                </tr>
                                @php
                                    $no++;
                                @endphp

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{ $value->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog  modal-md" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <div class="form-group">
                                                    <label>Berkas :</label>
                                                    <form action="legalisasi/show" method="POST" target="__BLANK">
                                                        @csrf
                                                        @method('get')
                                                        <input type="text" name="urlbukti"
                                                            value="{{ $value->file_berkas }}" hidden>
                                                        <button type="submit"
                                                            class="btn-sm btn btn-success text-white mb-2">
                                                            Lihat Berkas</button>
                                                    </form>
                                                    <br>
                                                    <label>Jenis Berkas :</label>
                                                    <h5>{{ $value->jenis_dokumen }}</h5>

                                                </div>

                                                <div class="form-group">
                                                    <label>Jumlah :</label>
                                                    <h5>{{ $value->jumlah }}</h5>

                                                </div>
                                                <div class="mb-2">
                                                    <label for="ambil">Ambil Berkas :</label>
                                                    <h5>{{ $value->pengambilan }}</h5>

                                                </div>
                                                @if ($value->pengambilan == 'Dikirim')
                                                    <div class="form-group">
                                                        <label for="pos">Kode Pos</label>
                                                        <h5>{{ $value->kode_pos }}</h5>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="textarea">Alamat Pengiriman :</label>
                                                        <h5>{{ $value->alamat }}</h5>

                                                    </div>
                                                @endif


                                                <div class="form-group">
                                                    <label for="biaya">Biaya Legalisasi :</label>
                                                    <h5>Rp. {{ $value->jumlah_bayar }}</h5>
                                                </div>
                                                <div class="form-group">
                                                    <label for="textarea">Catatan :</label>
                                                    @if ($value->catatan != null || $value->catatan != '')
                                                        <h5>{{ $value->catatan }}</h5>
                                                    @else
                                                        <h5>-</h5>
                                                    @endif

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                <!-- /.card-body -->

            </div>




            <script>
                $(document).ready(function() {
                    $("#input").fileinput({
                        showPreview: false,
                        showUpload: false,
                        elErrorContainer: '#kartik-file-errors',
                        allowedFileExtensions: ["jpg", "png", "pdf"]
                    });
                });
            </script>
        </div>
        <blockquote>
            <h2>INFORMASI</h2>
            <p>Untuk informasi lebih lanjut silahkan hubungi :</p>
            @foreach ($alamat as $item)
                <span>{{ $item->fakultas_univ }}</span><br>
                <span>Alamat: {{ $item->alamat }}</span><br>
                <span>Telepon : {{ $item->nomor_telepon }}</span><br>
                <span>Surel : {{ $item->email }}</span>
            @endforeach

        </blockquote>
    </div>


@endsection
