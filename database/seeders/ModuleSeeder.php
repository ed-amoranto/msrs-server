<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Module;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Module::insert([
            [
                "name" => "process_overview",
            ],
            [
                "name" => "wip",
            ],
            [
                "name" => "mgt-user",
            ],
        ]);
    }
}
