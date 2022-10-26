<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('company_profiles', function (Blueprint $table) {
            $table->id();

            $table->string('company');
            $table->string('motto')->nullable();
            $table->string('state');
            $table->string('city');
            $table->string('suburb');
            $table->string('street');
            $table->string('outdoor');
            $table->string('intdoor')->nullable();
            $table->string('zip_code',5);
            $table->string('rfc',13);
            $table->string('telephone',10);
            $table->string('telephone2',10)->nullable();
            $table->string('email');
            $table->string('website')->nullable();
            $table->string('logo')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('company_profiles');
    }
};
