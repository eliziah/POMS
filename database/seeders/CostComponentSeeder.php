<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CostComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cost_components')->insert([
            [
                'name' => 'Budget (Initial)'
            ],[
                'name' => 'Budget (CR)'
            ],[
                'name' => 'T3 Resource'
            ],[
                'name' => 'Vendor Payment'
            ],[
                'name' => 'License Payment'
            ],[
                'name' => 'Infrastructure Payment'
            ]
        ]);
    }
}
