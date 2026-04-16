<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
			$table->string('subject');
			$table->Text('message');
			$table->boolean('auth')->default(0);
			$table->integer('dept_id')->unsigned()->index()->nullable();
			$table->integer('user_id')->unsigned()->index()->nullable();
            $table->timestamps();
		
			$table->foreign('dept_id')->references('id')->on('depts')->onDelete('cascade');	
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');				
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
