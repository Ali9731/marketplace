<?php

namespace Database\Seeders;

use App\Models\TripStatus;
use Illuminate\Database\Seeder;

class TripStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TripStatus::firstOrCreate(['id' => 1, 'name' => 'ASSIGNED', 'persian_name' => 'پیک در مسیر فروشگاه']);
        TripStatus::firstOrCreate(['id' => 2, 'name' => 'AT_VENDOR', 'persian_name' => 'پیک در فروشگاه']);
        TripStatus::firstOrCreate(['id' => 3, 'name' => 'PICKED', 'persian_name' => 'پیک در مسیر']);
        TripStatus::firstOrCreate(['id' => 4, 'name' => 'DELIVERED', 'persian_name' => 'تحویل داده شده']);
    }
}
