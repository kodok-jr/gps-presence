<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Member;
use App\Models\Role;
use App\Models\User as Model;
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
        if (!Model::count()) {
            $role = Role::first();

            /** Admin User */
            $admins = [
                [
                    'name' => 'Super Admin',
                    'email' => 'superadmin@mail.com',
                    'password' => bcrypt('password')
                ]
            ];

            foreach ($admins as $key => $value) {
               $admin = Admin::create($value);
            }

            $admin->roles()->sync([$role->id]);

            /** Member User */
            $members = [
                [
                    'name' => 'John Doe',
                    'position' => 'Mahasiswa',
                    'number_id' => '1019901',
                    'email' => 'mahasiswa@mail.com',
                    'password' => bcrypt('password')
                ],
                [
                    'name' => 'Jhane Doe',
                    'position' => 'Dosen',
                    'number_id' => '1019902',
                    'email' => 'dosen@mail.com',
                    'password' => bcrypt('password')
                ]
            ];

            foreach ($members as $key => $value) {
                Member::create($value);
            }

            $role_administrator = Role::create([
                'name' => 'Administrator',
                'description' => 'Another level for example several role',
                'gates' => []
            ]);

            $role_administrator_sync = Role::findOrFail(2);

            $administrator = Admin::create([
                'name' => 'Administrator',
                'email' => 'administrator@mail.com',
                'password' => bcrypt('password')
            ]);

            $administrator->roles()->sync([$role_administrator_sync->id]);

        }

        $this->command->info('================ SUPERADMIN ======================');
        $this->command->info('email     : superadmin@mail.com');
        $this->command->info('password  : password');
        $this->command->info('==================================================');
        $this->command->info('');
        $this->command->info('================ ADMINISTRATOR ======================');
        $this->command->info('email     : administrator@mail.com');
        $this->command->info('password  : password');
        $this->command->info('==================================================');
        $this->command->info('');
        $this->command->info('===================== MEMBER =====================');
        $this->command->info('email     : mahasiswa@mail.com');
        $this->command->info('password  : password');
        $this->command->info('');
        $this->command->info('email     : dosen@mail.com');
        $this->command->info('password  : password');
        $this->command->info('==================================================');
    }
}
