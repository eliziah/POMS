<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->insert([
            [
                'name' => 'IPG'
            ],[
                'name' => 'HR COE'
            ],[
                'name' => 'HR EF'
            ],[
                'name' => 'IT COE'
            ],[
                'name' => 'CX COE'
            ],[
                'name' => 'Customer Success'
            ],[
                'name' => 'FARM'
            ]
        ]);
    }
}
