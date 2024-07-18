<?php

namespace Database\Seeders;

use App\Models\DelayReportStatus;
use Illuminate\Database\Seeder;

class DelayReportStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DelayReportStatus::firstOrCreate(['id' => 1, 'name' => 'PENDING', 'persian_name' => 'در انتظار بررسی']);
        DelayReportStatus::firstOrCreate(['id' => 2, 'name' => 'IN_PROGRESS', 'persian_name' => 'در حال بررسی']);
        DelayReportStatus::firstOrCreate(['id' => 3, 'name' => 'CLOSED', 'persian_name' => 'بررسی شده']);
        DelayReportStatus::firstOrCreate(['id' => 4, 'name' => 'NEW_ESTIMATE', 'persian_name' => 'تخمین جدید']);
    }
}
