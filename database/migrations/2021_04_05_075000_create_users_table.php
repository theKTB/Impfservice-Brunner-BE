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
            $table->string('socialNumber', 10)->unique();
            $table->string('firstName');
            $table->string('lastName');
            $table->enum('gender', ['m', 'w', 'd'])->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('street')->nullable();
            $table->string('houseNumber')->nullable();
            $table->string('zipCode', 4)->nullable();
            $table->string('city')->nullable();
            $table->string('phone')->nullable();
            $table->boolean('admin')->default(false);
            $table->boolean('vaccinated')->default(false);
            $table->rememberToken();
            $table->timestamps();

            // Cascade not necessary (don't delete user when date is deleted)
            $table->foreignId('vaccination_id')->nullable();
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
