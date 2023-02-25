<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLegalisasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legalisasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mahasiswa');
            $table->integer('nim_mahasiswa');
            $table->string('file_berkas');
            $table->string('jenis_dokumen');
            $table->string('jumlah');
            $table->string('pengambilan');
            $table->string('kode_pos')->nullable(true);
            $table->string('alamat')->nullable(true);
            $table->string('jumlah_bayar');
            $table->string('file_konfirmasi')->nullable(true);
            $table->string('catatan')->nullable(true);
            $table->boolean('is_upload')->default(0);
            $table->boolean('is_confirm')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('legalisasi');
    }
}
