<?php

namespace Database\Seeders;

use App\Models\MonitoringBase;
use Illuminate\Database\Seeder;

class MonitoringBaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MonitoringBase::create([
            'slug' => 'total_budged',
            'total_budged' => 0,
        ]);
    }
}
