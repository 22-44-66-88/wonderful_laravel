<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('ci');
            $table->string('first_name');
            $table->string('second_name');
            $table->string('last_name');
            $table->string('mother_last_name');
            $table->enum('gender',['M','F']);
            $table->date('birthday');
            // $table->integer('age');
            $table->string('user');
            $table->string('password');
            $table->boolean('active');
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
        Schema::dropIfExists('clients');
    }
}
