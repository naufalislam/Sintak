<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Http\Services\Dosen\PembimbingService;
use App\Http\Services\TugasAkhir\TugasAkhirBaseService;
use Illuminate\Http\Request;

class TAController extends Controller
{

    private $tugasAkhirService;
    private $pembimbingService;

    public function __construct(TugasAkhirBaseService $tugasAkhirService, PembimbingService $pembimbingService)
    {
        $this->tugasAkhirService = $tugasAkhirService;
        $this->pembimbingService = $pembimbingService;
    }

    public function index()
    {
        $ta = $this->tugasAkhirService->getTugasAkhir();
        if (!$ta) {
            return view('mahasiswa.no_ta');
        }
        $pembimbings['Pembimbing 1'] = $this->pembimbingService->getKetPembimbing($ta->mahasiswa, 1);
        $pembimbings['Pembimbing 2'] = $this->pembimbingService->getKetPembimbing($ta->mahasiswa, 2);
        return view('mahasiswa.ta', compact('ta', 'pembimbings'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $res = $this->tugasAkhirService->insert();
        if ($res) {
            return redirect()->route('mahasiswa.TA.index')->withSuccess('Berhasil di tambahkan');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $ta = $this->tugasAkhirService->getTA($id);
        return view('mahasiswa.TA.edit', compact('ta'));
    }

    public function update(Request $request, $id)
    {
        $res = $this->tugasAkhirService->updateTA($id);
        if ($res) {
            return redirect()->route('mahasiswa.TA.index')->withSuccess('Berhasil di edit');
        }
    }

    public function destroy($id)
    {
        //
    }
}
