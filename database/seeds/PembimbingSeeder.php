<?php

use App\Dosen;
use App\Http\Services\Dosen\DosenBaseService;
use App\Http\Services\Mahasiswa\MahasiswaBaseService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PembimbingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(MahasiswaBaseService $mahasiswaBaseService)
    {
        $mahasiswas = $mahasiswaBaseService->getAll();
        $dosens = Dosen::all();
        for ($i = 0; $i <= 99; $i++) {
            DB::table('pembimbing')->insert([
                'dosen_id' => $dosens[$i]->id,
                'nim' => $mahasiswas[$i]->nim,
                'keterangan' => 'pembimbing1',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
