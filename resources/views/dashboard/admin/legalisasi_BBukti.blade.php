@extends('dashboard.layouts.home_layouts')
@section('title', 'Belum Kirim Bukti')
{{-- @section('data', 'active') --}}
@section('belum', 'active')
@section('open', 'menu-open')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Legalisasi jarak jauh/Distanced Legalization</h5>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Nim</th>
                                <th>Jenis Dokumen</th>
                                <th>Pengambilan</th>
                                <th>Jumlah Bayar</th>
                                <th>Detail</th>
                                <th>Bukti Konfirmasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp

                            @foreach ($data as $key => $value)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $value->nama_mahasiswa }}</td>
                                    <td>{{ $value->nim_mahasiswa }}</td>
                                    <td>{{ $value->jenis_dokumen }}
                                    </td>
                                    <td>{{ $value->pengambilan }}</td>
                                    <td>Rp. {{ $value->jumlah_bayar }}</td>
                                    <td class="text-center"><button type="button" data-toggle="modal"
                                            data-target="#exampleModal{{ $value->id }}"
                                            class="btn-sm btn btn-primary">Detail</button>

                                    </td>
                                    <td class="text-center">
                                        @if ($value->file_konfirmasi == null || $value->file_konfirmasi == '')
                                            <span class="btn-sm btn btn-danger text-white mb-2">Belum Ada Bukti</span>
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
                                                    <form action="data/show" method="POST">
                                                        @csrf
                                                        @method('get')
                                                        <input type="text" name="urlbukti"
                                                            value="{{ $value->file_berkas }}" hidden>
                                                        <button type="submit"
                                                            class="btn-sm btn btn-success text-white mb-2">Lihat
                                                            Berkas</button>
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
                                                    <h5>{{ $value->catatan }}</h5>

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
                    $("input[name=check]").change(function() {

                        if ($("#internal").is(':checked')) {
                            $("#company_select").show();
                        } else {
                            $("#company_select").hide();
                        }
                    });
                });
            </script>
        </div>
    </div>


@endsection
