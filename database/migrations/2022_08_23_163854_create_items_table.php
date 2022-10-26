<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('internal_order_id');
            $table->foreign('internal_order_id')
                ->references('id')
                ->on('internal_orders');
            $table->string('item');
            $table->integer('amount');
            $table->string('unit');
            $table->string('family');
            $table->string('code');
            $table->text('description');
            $table->double('unit_price');
            $table->double('import');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('items');
    }
};
