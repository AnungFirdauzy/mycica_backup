<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPenjualanBurungsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_penjualan_burungs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_investasi');
            $table->date('tgl_terjual');
            $table->string('nama_pembeli');
            $table->string('phone');
            $table->string('harga_jual');
            $table->string('nominal_transfer');
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
        Schema::dropIfExists('data_penjualan_burungs');
    }
}
