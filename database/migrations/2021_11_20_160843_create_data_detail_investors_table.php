<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataDetailInvestorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_detail_investors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_investor')->unique();
            $table->string('alamat');
            $table->string('rtRw');
            $table->string('kabupatenkota');
            $table->string('kodepos');
            $table->string('ttl');
            $table->string('rekening');
            $table->string('ktp'); 
            $table->string('pasfoto'); 
            $table->string('persetujuan'); 
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
        Schema::dropIfExists('data_detail_investors');
    }
}
