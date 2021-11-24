<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataInvestasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_investasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_burungs')->unique();
            $table->foreignId('id_investor');
            $table->date('tgl_investasi');
            $table->date('tgl_jatuhTempo');
            $table->string('status_transaksi');
            $table->string('jadwal_perawatan')->nullable();
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
        Schema::dropIfExists('data_investasis');
    }
}
