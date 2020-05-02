<?php

namespace App\Http\Services\Dosen;

use App\Dosen;
use App\Mahasiswa;
use App\Pembimbing;
use Illuminate\Http\Request;

class PembimbingService
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getAvailPembimbing()
    {
        $pembimbings = Dosen::with('bimbing')->get();
        foreach ($pembimbings as $pembimbing) {
            if ($pembimbing->bimbing->count() < 4) {
                $availPembimbing[] = $pembimbing;
            }
        }
        return collect($availPembimbing);
    }

    public function getKetPembimbing($mahasiswa, $ke = null)
    {
        if ($ke == 1) {
            $res = Pembimbing::where('nim', $mahasiswa->nim)
                ->where('keterangan', 'pembimbing1')
                ->first();
        } else {
            $res = Pembimbing::where('nim', $mahasiswa->nim)
                ->where('keterangan', 'pembimbing2')
                ->first();
        }
        return $res;
    }

    public function update($nim)
    {
        $this->request->validate($this->rules());
        $this->deleteByNim($nim);
        $pembimbings = ['pembimbing1' => $this->request->pembimbing_pertama, 'pembimbing2' => $this->request->pembimbing_kedua];
        foreach ($pembimbings as $keys => $value) {
            if ($value != null) {
                Pembimbing::insert([
                    'dosen_id' => $value,
                    'nim' => $nim,
                    'keterangan' => $keys,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
            }
        }
    }

    public function deleteByNim($nim)
    {
        $res = Pembimbing::where('nim', $nim)->delete();
        return $res;
    }

    public function rules()
    {
        return [
            'pembimbing_pertama' => 'required',
            // 'pembimbing_kedua' => 'required'
        ];
    }
}
