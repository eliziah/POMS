<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Rod Molina',
                'email' => 'rod@gmail.com',
                'password' => Hash::make('password'),
                'role' => 2
            ],[
                'name' => 'Monique Mahusay',
                'email' => 'monik@gmail.com',
                'password' => Hash::make('password'),
                'role' => 1
            ],[
                'name' => 'Marianne Tandoc',
                'email' => 'maan@gmail.com',
                'password' => Hash::make('password'),
                'role' => 1
            ],[
                'name' => 'Jose Immanuel Ramos',
                'email' => 'iman@gmail.com',
                'password' => Hash::make('password'),
                'role' => 1
            ],[
                'name' => 'Rodil Ramos',
                'email' => 'odi@gmail.com',
                'password' => Hash::make('password'),
                'role' => 1
            ],[
                'name' => 'Carolina Dela Cruz',
                'email' => 'carol@gmail.com',
                'password' => Hash::make('password'),
                'role' => 1
            ],[
                'name' => 'Louie Linag',
                'email' => 'louie@gmail.com',
                'password' => Hash::make('password'),
                'role' => 1
            ],[
                'name' => 'Yel Arevalo',
                'email' => 'yel@gmail.com',
                'password' => Hash::make('password'),
                'role' => 1
            ]
        ]);
    }
}
