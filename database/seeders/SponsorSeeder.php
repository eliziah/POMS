<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sponsors')->insert([
            [
                'name' => 'Cyrus Igban'
            ],[
                'name' => 'Chris Onte'
            ],[
                'name' => 'Froi Rabatan'
            ],[
                'name' => 'Marc Kerveillant'
            ],[
                'name' => 'Hershey Del Rosario'
            ]
        ]);
    }
}
