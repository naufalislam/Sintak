<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        for ($i = 0; $i <= 99; $i++) {
            DB::table('dosen')->insert([
                'nama' => $faker->name,
                'email' => 'dosen' . $i . '@gmail.com',
                'password' => Hash::make('dosen'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
