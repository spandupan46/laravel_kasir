<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbTokosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_toko', function (Blueprint $table) {
            $table->id();
            $table->integer('id_customer');
            $table->string('nama_toko');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return vostring
     */
    public function down()
    {
        Schema::dropIfExists('tb_tokos');
    }
}
