<?php

use App\Http\Services\Mahasiswa\MahasiswaBaseService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JudulTASeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(MahasiswaBaseService $mahasiswaBaseService, Faker\Generator $faker)
    {
        $mahasiswas = $mahasiswaBaseService->getAll();
        foreach ($mahasiswas as $mahasiswa) {
            DB::table('judul_tugas_akhir')->insert([
                'nim' => $mahasiswa->nim,
                'judul' => $faker->sentence,
                'deskripsi' => $faker->paragraph,
                'manfaat' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'status_ta' => 'diterima',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
