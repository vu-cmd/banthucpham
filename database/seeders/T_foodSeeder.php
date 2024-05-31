<?php

namespace Database\Seeders;

use App\Models\T_food;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class T_foodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        T_food::factory()
        ->count(3)
        ->create();
    }
}
