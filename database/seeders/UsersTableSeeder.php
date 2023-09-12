<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Member;
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
        if (!Admin::count()) {
            $role = Role::first();

            $admin = Admin::create([
                'name' => 'Super Admin',
                'email' => 'admin@mail.com',
                'password' => bcrypt('password')
            ]);

            $admin->roles()->sync([$role->id]);
        }

        if (!Member::count()) {
            $member = Member::create([
                'name' => 'John Doe',
                'email' => 'member@mail.com',
                'password' => bcrypt('password')
            ]);
        }

        $this->command->info('================ SUPERADMIN ======================');
        $this->command->info('email     : admin@mail.com');
        $this->command->info('password  : password');
        $this->command->info('==================================================');
        $this->command->info('==================================================');
        $this->command->info('===================== MEMBER =====================');
        $this->command->info('email     : member@mail.com');
        $this->command->info('password  : password');
        $this->command->info('==================================================');
    }
}
