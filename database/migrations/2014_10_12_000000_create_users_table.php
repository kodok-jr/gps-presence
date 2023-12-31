<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->uuid('uuid')->unique();

            $table->string('name');
            $table->string('username')->nullable();
            $table->string('position')->nullable();
            $table->bigInteger('number_id')->unique()->nullable();

            $table->string('phone')->unique()->nullable();
            $table->text('address')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();

            $table->string('avatar')->nullable();

            $table->timestamps();

            $table->string('state')->nullable();
            $table->string('type')->nullable();
            $table->softDeletes();
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
};
