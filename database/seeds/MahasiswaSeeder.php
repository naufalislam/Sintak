<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        $kelas = ['A', 'B', 'C', 'D'];
        for ($i = 0; $i <= 99; $i++) {
            if ($i < 10) {
                $nim = '1709000' . $i;
            } else {
                $nim = '170900' . $i;
            }
            DB::table('mahasiswa')->insert([
                'nim' => $nim,
                'nama' => $faker->name,
                'semester' => '6',
                'kelas' =>  $faker->randomElement($kelas),
                'tahun' => '2017',
                'password' => Hash::make('f'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
