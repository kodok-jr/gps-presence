<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!User::count()) {
            $role = Role::first();

            $user = User::create([
                'name' => 'John Doe',
                'email' => 'admin@mail.com',
                'password' => bcrypt('password')
            ]);

            $user->roles()->sync([$role->id]);
        }

        $this->command->info('================ SUPERADMIN ======================');
        $this->command->info('email     : admin@mail.com');
        $this->command->info('password  : password');
        $this->command->info('==================================================');
    }
}
