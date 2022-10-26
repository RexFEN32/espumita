<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('internal_orders', function (Blueprint $table) {
            $table->id();

            $table->string('invoice');
            $table->date('date');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')
                ->references('id')
                ->on('customers');
            $table->unsignedBigInteger('seller_id');
            $table->foreign('seller_id')
                ->references('id')
                ->on('sellers');
            $table->date('date_delivery');
            $table->date('instalation_date');
            $table->string('shipment');
            $table->unsignedBigInteger('customer_shipping_address_id');
            $table->foreign('customer_shipping_address_id')
                ->references('id')
                ->on('customer_shipping_addresses');
            $table->unsignedBigInteger('coin_id');
            $table->foreign('coin_id')
                ->references('id')
                ->on('coins');
            $table->double('subtotal');
            $table->double('iva');
            $table->double('total');
            $table->string('payment_conditions');
            $table->text('observations')->nullable();
            $table->string('status');
            $table->unsignedBigInteger('authorization_id');
            $table->foreign('authorization_id')
                ->references('id')
                ->on('authorizations');
                
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('internal_orders');
    }
};
