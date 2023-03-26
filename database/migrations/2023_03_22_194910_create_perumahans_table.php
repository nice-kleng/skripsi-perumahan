<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perumahan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_lokasi');
            $table->string('nama_perumahan');
            $table->string('slug');
            $table->string('jenis_perumahan');
            $table->string('nomor_kolektif');
            $table->dateTime('tanggal_terbit');
            $table->string('pdf_imb');
            $table->string('siteplan');
            $table->string('dusun');
            $table->string('desa');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('propinsi');
            $table->string('gmap');
            $table->string('f_gerbang');
            $table->string('f_posisi_tengah');
            $table->string('f_rumah');
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
        Schema::dropIfExists('perumahan');
    }
};
