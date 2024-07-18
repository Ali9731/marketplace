<?php

namespace Database\Seeders;

use App\Models\Agent;
use App\Models\Order;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Order::factory(20)->create();
        Agent::factory(10)->create();
    }
}
