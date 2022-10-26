<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('authorizations', function (Blueprint $table) {
            $table->id();

            $table->string('job');
            $table->string('clearance_level');
            $table->string('key_code');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('authorizations');
    }
};
