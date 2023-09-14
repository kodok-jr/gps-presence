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
        Schema::disableForeignKeyConstraints();

        Schema::create('presences', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->date('presence_date');
            $table->time('time_in');
            $table->time('time_out')->nullable();
            $table->string('photo_in');
            $table->string('photo_out')->nullable();
            $table->text('locations');

            $table->timestamps();

            $table->string('state')->nullable();
            $table->string('type')->nullable();
            $table->softDeletes();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('presences');

        Schema::enableForeignKeyConstraints();
    }
};
