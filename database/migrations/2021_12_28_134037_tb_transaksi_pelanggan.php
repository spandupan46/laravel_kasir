<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbTransaksiPelanggan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tb_transaksi_pelanggan', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('id_produk_pelanggan');
            $table->string('reference');
            $table->string('merchant_ref');
            $table->string('payment_selection_type');
            $table->string('payment_method');
            $table->string('payment_name');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->string('callback_url');
            $table->string('return_url');
            $table->string('amount');
            $table->string('fee_merchant');
            $table->string('fee_customer');
            $table->string('total_fee');
            $table->string('amount_received');
            $table->string('pay_code');
            $table->string('pay_url');
            $table->string('checkout_url');
            $table->string('status');
            $table->string('expired_time');
            $table->string('qr_string');
            $table->string('qr_url');

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
