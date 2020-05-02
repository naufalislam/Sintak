<?php

namespace App\Http\Controllers\Kaprodi;

use App\Http\Controllers\Controller;
use App\Http\Services\Mahasiswa\MahasiswaBaseService;
use App\Http\Services\TugasAkhir\TugasAkhirBaseService;
use App\JudulTugasAkhir;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ListTAController extends Controller
{

    private $tugasAkhirService;
    private $mhsService;

    public function __construct(TugasAkhirBaseService $tugasAkhirService, MahasiswaBaseService $mhsService)
    {
        $this->tugasAkhirService = $tugasAkhirService;
        $this->mhsService = $mhsService;
    }

    public function index(Request $request)
    {
        $list_ta = $this->tugasAkhirService->getDataTable();
        if ($request->ajax()) {
            return DataTables::of($list_ta)
                ->addIndexColumn()
                ->editColumn('nama', function ($data) {
                    return $data->mahasiswa->nama;
                })
                ->editColumn('status_ta', function ($data) {
                    $btn = "<button class='btn btn-sm btn-secondary'>{$data->status_ta}</button></td>";
                    return $btn;
                })
                ->addColumn('aksi', function ($data) {
                    $btn = "<a class='btn btn-sm btn-icon btn-2 btn-primary' type='button' href='" . route('kaprodi.TA.show', $data->id) . "'>
                                <span class='btn-inner--icon text-white'><i class='ni ni-settings-gear-65 text-white'></i>Detail</span>
                            </a><br>";
                    if ($data->status_ta != 'diterima') {
                        $btn .= view('kaprodi.form.delete', compact('data'));
                    }
                    return $btn;
                })
                ->rawColumns(['aksi', 'status_ta'])
                ->make(true);
        }

        return view('kaprodi.list_ta');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
        $ta = $this->tugasAkhirService->getTA($id);
        return view('kaprodi.detail', compact('ta'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $res = $this->tugasAkhirService->delete($id);
        if ($res) {
            return redirect()->back()->withSuccess('Berhasil di hapus');
        }
        return redirect()->back()->withErrors('Gagal dihapus');
    }
}
