<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('temp_internal_orders', function (Blueprint $table) {
            $table->id();

            $table->date('date');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')
                ->references('id')
                ->on('customers');
            $table->unsignedBigInteger('seller_id')->nullable();
            $table->foreign('seller_id')
                ->references('id')
                ->on('sellers');
            $table->date('date_delivery')->nullable();
            $table->date('instalation_date')->nullable();
            $table->string('shipment')->nullable();
            $table->unsignedBigInteger('customer_shipping_address_id')->nullable();
            $table->foreign('customer_shipping_address_id')
                ->references('id')
                ->on('customer_shipping_addresses');
            $table->unsignedBigInteger('coin_id')->nullable();
            $table->foreign('coin_id')
                ->references('id')
                ->on('coins');
            $table->double('subtotal')->nullable();
            $table->double('iva')->nullable();
            $table->double('total')->nullable();
            $table->string('payment_conditions')->nullable();
            $table->text('observations')->nullable();
            $table->string('status')->nullable();
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('temp_internal_orders');
    }
};
