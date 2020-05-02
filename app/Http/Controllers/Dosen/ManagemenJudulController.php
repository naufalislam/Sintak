<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Http\Services\Mahasiswa\MahasiswaBaseService;
use App\Http\Services\TugasAkhir\TugasAkhirBaseService;
use App\Mahasiswa;
use Illuminate\Http\Request;

class ManagemenJudulController extends Controller
{
    private $mhsService;
    private $taService;

    public function __construct(MahasiswaBaseService $mhsService, TugasAkhirBaseService $taService)
    {
        $this->mhsService = $mhsService;
        $this->taService = $taService;
    }

    public function index()
    {
        $mahasiswas = $this->mhsService->getMahasiswasTA();
        return view('dosen.managemen', compact('mahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nim)
    {
        $mahasiswa = $this->mhsService->findByNim($nim, 'ta');
        return view('dosen.managemen_judul.lihat', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nim)
    {
        $res = $this->taService->update($nim);
        if ($res) {
            return redirect()->back()->withSuccess('Berhasil');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
