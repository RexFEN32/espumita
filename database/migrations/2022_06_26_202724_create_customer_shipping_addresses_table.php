<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('customer_shipping_addresses', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')
                ->references('id')
                ->on('customers');
            $table->string('customer_shipping_alias');
            $table->string('customer_shipping_state');
            $table->string('customer_shipping_city');
            $table->string('customer_shipping_suburb');
            $table->string('customer_shipping_street');
            $table->string('customer_shipping_outdoor');
            $table->string('customer_shipping_indoor')->nullable();
            $table->string('customer_shipping_zip_code',5);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customer_shipping_addresses');
    }
};
