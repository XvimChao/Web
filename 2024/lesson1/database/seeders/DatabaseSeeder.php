<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ReportType;
use App\Models\Report;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Database\Seeders\ReportSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ReportSeeder::class);
    }
}
