<?php

use App\Helpers\Menu;
use App\Models\Role;
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
        // Schema::disableForeignKeyConstraints();

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();

            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->json('gates')->nullable();

            $table->timestamps();

            $table->string('state')->nullable();
            $table->string('type')->nullable();
            $table->softDeletes();
        });

        // Schema::enableForeignKeyConstraints();

        $menu = new Menu;

        Role::create([
            'name' => 'Super Admin',
            'description' => 'Top level for access all modules',
            'gates' => $menu->gates($menu->menus) ?? []
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('roles');

        // Schema::enableForeignKeyConstraints();
    }
};
