<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataBurungsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_burungs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_peternak');
            $table->string('nama_burung');
            $table->date('tanggal_menetas');
            $table->date('tanggal_max_investasi');
            $table->string('jenis_kelamin');
            $table->string('berat');
            $table->text('riwayat_medis')->nullable();
            $table->string('foto_burung')->nullable();
            $table->string('biaya_tambahan')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('data_burungs');
    }
}
