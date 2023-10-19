<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Setting::count()) {
            Setting::create([
                'base_location' => '-6.913743231352625, 107.82192851779101',
                'radius' => 50
            ]);
        }
    }
}
