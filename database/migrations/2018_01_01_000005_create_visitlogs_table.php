<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('visitlogs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('link_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('user_ip')->nullable();
            $table->string('user_system')->nullable();
            $table->string('user_login')->nullable();
            $table->string('dest_url')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visitlogs');
    }
};
