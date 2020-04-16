<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('ci');
            $table->string('first_name');
            $table->string('second_name');
            $table->string('last_name');
            $table->string('mother_last_name');
            $table->enum('gender',['M','F']);
<<<<<<< HEAD
            // $table->string('user')->unique();
            $table->string('email',40)->unique();
=======
            $table->integer('phone_number');
            $table->date('birthday');
            $table->string('user')->unique();
>>>>>>> 060a53449c260cfb482a528fe5b24100c9274db5
            $table->string('password');
            $table->boolean('active');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
