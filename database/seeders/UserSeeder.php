<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        'DB'::table('users')->insert([
            'name' => 'Test User',
            'no_telepon' => '085849165479',
            'alamat' => 'JL.Kadirojo 2',
            'email' => 'Tedis@gmail.com',
            'dob' => '2001-03-26',
            'role' => 'user',
            'password' => password_hash('12345678', PASSWORD_DEFAULT)
            
        ]);
        'DB'::table('users')->insert([
            'name' => 'Tedis',
            'no_telepon' => '085849165479',
            'alamat' => 'JL.Kadirojo 2',
            'email' => 'lud@gmail.com',
            'dob' => '2001-03-26',
            'role' => 'admin',
            'is_active' => 1,
            'password' => password_hash('12345678', PASSWORD_DEFAULT)
            
        ]);
    }
}
