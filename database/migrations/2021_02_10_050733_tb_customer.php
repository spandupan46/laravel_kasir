<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tb_customer', function (Blueprint $table) {
            $table->id();
            $table->string('id_user');
            $table->string('nama_customer');
            $table->string('subscription_status');
            $table->string('subscription_start');
            $table->string('subscription_end');
            $table->string('status_login');
            $table->string('created_at');
            $table->string('updated_at');
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
