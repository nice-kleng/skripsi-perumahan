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
        Schema::create('spesifikasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perumahan_id');
            $table->string('tipe');
            // $table->string('jenis');
            $table->string('harga');
            $table->string('l_bangunan');
            $table->string('l_lahan');
            $table->string('k_tidur');
            $table->string('k_mandi');
            $table->string('atap');
            $table->string('dinding');
            $table->string('lantai_pondasi');
            $table->string('f_depan');
            $table->string('f_denah');
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
        Schema::dropIfExists('spesifikasi');
    }
};
