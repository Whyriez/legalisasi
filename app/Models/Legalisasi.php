<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Legalisasi extends Model
{
    use HasFactory;
    protected $table = 'legalisasi';
    // protected fillable = ['nama_mahasiswa', 'nim_mahasiswa', 'file_berkas', 'jenis_dokumen', 'pengambian', 'jumlah_bayar']
}
