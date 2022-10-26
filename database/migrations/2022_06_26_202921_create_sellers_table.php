<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();

            $table->string('seller_name');
            $table->string('seller_mobile')->nullable();
            $table->string('seller_office_phone')->nullable();
            $table->string('seller_office_phone_ext')->nullable();
            $table->string('seller_email')->nullable();
            $table->string('seller_state')->nullable();
            $table->string('seller_city')->nullable();
            $table->string('seller_suburb')->nullable();
            $table->string('seller_street')->nullable();
            $table->string('seller_outdoor')->nullable();
            $table->string('seller_indoor')->nullable();
            $table->string('seller_zip_code',5)->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sellers');
    }
};
