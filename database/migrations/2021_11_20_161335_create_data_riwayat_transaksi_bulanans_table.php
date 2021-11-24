<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataRiwayatTransaksiBulanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_riwayat_transaksi_bulanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_investasi');
            $table->string('tgl_transaksi')->nullable();
            $table->string('biaya_perawatan');
            $table->string('biaya_tambahan');
            $table->string('riwayat_transaksi');
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
        Schema::dropIfExists('data_riwayat_transaksi_bulanans');
    }
}
