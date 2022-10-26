<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();

            $table->string('customer');
            $table->string('customer_rfc',13);
            $table->string('customer_state');
            $table->string('customer_city');
            $table->string('customer_suburb');
            $table->string('customer_street');
            $table->string('customer_outdoor');
            $table->string('customer_indoor')->nullable();
            $table->string('customer_zip_code',5);
            $table->string('customer_email');
            $table->string('customer_telephone',10);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
