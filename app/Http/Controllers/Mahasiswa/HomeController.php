<?php

namespace App\Http\Controllers\Mahasiswa;

use App\JudulTugasAkhir;
use App\Http\Controllers\Controller;
use App\Http\Services\TugasAkhir\TugasAkhirBaseService;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    private $tugasAkhirService;

    public function __construct(TugasAkhirBaseService $tugasAkhirService)
    {
        $this->tugasAkhirService = $tugasAkhirService;
    }

    public function index()
    {
        $judulta= JudulTugasAkhir::count();
        $ta = $this->tugasAkhirService->getTugasAkhir();
        return view('mahasiswa.dashboard', compact('ta','judulta'));
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
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
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
