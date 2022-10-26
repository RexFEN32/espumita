<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('customer_contacts', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')
                ->references('id')
                ->on('customers');
            $table->string('customer_contact_name');
            $table->string('customer_contact_mobile')->nullable();
            $table->string('customer_contact_office_phone')->nullable();
            $table->string('customer_contact_office_phone_ext')->nullable();
            $table->string('customer_contact_email')->nullable();
            $table->string('customer_contact_state')->nullable();
            $table->string('customer_contact_city')->nullable();
            $table->string('customer_contact_suburb')->nullable();
            $table->string('customer_contact_street')->nullable();
            $table->string('customer_contact_outdoor')->nullable();
            $table->string('customer_contact_indoor')->nullable();
            $table->string('customer_contact_zip_code',5)->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customer_contacts');
    }
};
