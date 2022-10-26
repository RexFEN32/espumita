<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('coins', function (Blueprint $table) {
            $table->id();

            $table->string('coin');
            $table->string('symbol')->nullable();
            $table->string('code')->nullable();
            $table->string('exchange_rate');
            $table->string('date_application');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('coins');
    }
};
