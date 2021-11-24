<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPerkembanganBurungsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_perkembangan_burungs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_burung');
            $table->date('tgl_diperbarui');
            $table->string('berat');
            $table->string('riwayat_medis')->nullable();
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
        Schema::dropIfExists('data_perkembangan_burungs');
    }
}
