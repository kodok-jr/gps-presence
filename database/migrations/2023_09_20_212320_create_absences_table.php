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

        Schema::create('absences', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->date('absence_date');
            $table->enum('status', ["permit", "diseased"]);
            $table->text('description')->nullable();
            $table->enum('approval', ["pending", "approved", "rejected"])->default('pending');

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
        Schema::dropIfExists('absences');
        Schema::enableForeignKeyConstraints();
    }
};
