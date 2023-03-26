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
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perumahan_id');
            $table->foreignId('rumah_id');
            $table->string('kode_pembelian');
            $table->string('nik');
            $table->string('nama');
            $table->string('ttl');
            $table->string('alamat');
            $table->string('pekerjaan');
            $table->integer('dp');
            $table->integer('kurang_bayar');
            $table->enum('status', ['0', '1']);
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
        Schema::dropIfExists('penjualan');
    }
};
