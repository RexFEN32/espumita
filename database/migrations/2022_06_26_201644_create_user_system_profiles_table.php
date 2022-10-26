<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('user_system_profiles', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->string('user_job')->nullable();
            $table->string('user_mobile',10)->nullable();
            $table->string('user_office_phone',10)->nullable();
            $table->string('user_office_phone_ext')->nullable();
            $table->string('user_home_phone',10)->nullable();
            $table->string('user_rfc',13)->nullable();
            $table->string('user_curp',18)->nullable();
            $table->string('user_state')->nullable();
            $table->string('user_city')->nullable();
            $table->string('user_suburb')->nullable();
            $table->string('user_street')->nullable();
            $table->string('user_outdoor')->nullable();
            $table->string('user_intdoor')->nullable();
            $table->string('user_zip_code',5)->nullable();

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
        Schema::dropIfExists('user_system_profiles');
    }
};
