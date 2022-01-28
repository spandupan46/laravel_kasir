<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TransaksiLangganan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('transaksi_langganan', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->integer('id_customer');
            $table->integer('id_produk');
            $table->enum('status_langganan', ['gratis', 'tidak_langganan', 'langganan']);
            $table->string('mulai_langganan');
            $table->string('akhir_langganan');
            $table->softDeletes();
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
        //
    }
}
