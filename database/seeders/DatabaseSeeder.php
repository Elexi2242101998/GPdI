<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Faker\Factory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Factory::create();
        for ( $i=0 ; $i < 30 ; $i++) {
          'DB'::table('users')->insert([
              'name' => $faker->name,
              'email' => $faker->email,
              'alamat' => $faker->address,
              'no_telepon' => $faker->phoneNumber,
              'password' => $faker->password,
              'dob' => $faker->date('Y-m-d', now())
    
          ]);
      }
   
}

}
