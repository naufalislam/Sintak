<?php

namespace App\Http\Services\TugasAkhir;

use App\JudulTugasAkhir;
use App\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TugasAkhirBaseService
{
    private $auth;
    private $request;

    public function __construct(Request $request)
    {
        $this->auth = Auth::guard('mahasiswa');
        $this->request = $request;
    }

    public function getDataTable($filter = [])
    {
        $judul = JudulTugasAkhir::with('mahasiswa');
        if (isset($filter['status_ta'])) {
            $judul = $judul->where('status_ta', $filter['status_ta']);
        }
        return $judul->latest()->get();
    }

    public function getAllTugasAkhir($filter = [])
    {
        $judul = JudulTugasAkhir::with('mahasiswa');
        if (isset($filter['status_ta'])) {
            $judul = $judul->where('status_ta', $filter['status_ta'])->paginate();
        } else {
            $judul = $judul->paginate();
        }
        return $judul;
    }

    public function getTA($id)
    {
        return JudulTugasAkhir::with('mahasiswa')->get()->find($id);
    }

    public function getTugasAkhir()
    {
        $ta = $this->auth->user()->judul_tugas_akhir;
        if ($ta != null) {
            return $ta->first();
        }
        return false;
    }

    public function insert()
    {
        $res = $this->request->validate($this->rules());
        $ta = new JudulTugasAkhir();
        $ta->judul = $res['judul'];
        $ta->manfaat = $res['manfaat'];
        $ta->deskripsi = $res['deskripsi'];
        $ta->status_ta = 'menunggu';

        $ta->mahasiswa()->associate($this->auth->user());
        return $ta->save();
    }

    public function update($nim)
    {
        $this->request->validate(['status_ta' => 'required']);
        $res = JudulTugasAkhir::where('nim', $nim)->update(['status_ta' => $this->request->status_ta]);
        return $res;
    }

    public function updateTA($id)
    {
        $this->request->validate($this->rules());
        $TA = JudulTugasAkhir::find($id);
        $TA->judul = $this->request->judul;
        $TA->deskripsi = $this->request->deskripsi;
        $TA->manfaat = $this->request->manfaat;
        return $TA->save();
    }

    public function delete($id)
    {
        $res = JudulTugasAkhir::destroy($id);
        return $res;
    }

    public function rules()
    {
        return [
            'judul' => 'required',
            'manfaat' => 'required',
            'deskripsi' => 'required'
        ];
    }
}
