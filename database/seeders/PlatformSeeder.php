<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('platforms')->insert([
            [
                'name' => 'Others'
            ],[
                'name' => 'AI'
            ],[
                'name' => 'Custom Dev'
            ],[
                'name' => 'DigiOffice'
            ],[
                'name' => 'Sunfish'
            ],[
                'name' => 'PeopleSoft'
            ],[
                'name' => 'CI/CD'
            ],[
                'name' => 'PowerBI'
            ],[
                'name' => 'NXT'
            ],[
                'name' => 'T3'
            ],[
                'name' => 'TiTo'
            ]
        ]);
    }
}
