<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clients')->insert([
            [
                'name' => 'BPI'
            ],[
                'name' => 'Globe'
            ],[
                'name' => 'LRMC'
            ],[
                'name' => 'AYala Corp'
            ]
        ]);
    }
}
