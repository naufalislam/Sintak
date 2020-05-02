<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KaprodiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        for ($i = 0; $i <= 99; $i++) {
            DB::table('kaprodi')->insert([
                'nama' => $faker->name,
                'email' => 'kaprodi' . $i . '@gmail.com',
                'password' => Hash::make('kaprodi'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
