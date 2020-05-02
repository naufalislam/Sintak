<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Mahasiswa\MahasiswaBaseService;
use App\Mahasiswa;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class MasterMahasiswaController extends Controller
{
    private $mhsService;

    public function __construct(MahasiswaBaseService $mhsService)
    {
        $this->mhsService = $mhsService;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $mahasiswa = $this->mhsService->getDataTable();
            return DataTables::of($mahasiswa)
                ->addIndexColumn()
                ->editColumn('nama', function ($data) {
                    return $data->nama;
                })
                ->editColumn('nim', function ($data) {
                    return $data->nim;
                })
                ->editColumn('kelas', function ($data) {
                    return $data->kelas;
                })
                ->addColumn('aksi', function ($data) {
                    $btn = "<a href='" . route('admin.master.mahasiswa.show', $data->nim) . "' class='btn btn-sm btn-primary'>Detail</a>";
                    return $btn;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }

        return view('admin.master.mahasiswa.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $res = $this->mhsService->insertBatch();
        } else {
            $res = $this->mhsService->insert();
        };
        if ($res) {
            return redirect()->back()->withSuccess('Berhasil');
        }
    }

    public function show($nim)
    {
        $mahasiswa = $this->mhsService->findByNim($nim);
        return view('admin.master.mahasiswa.show', compact('mahasiswa'));
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
        //
    }
}
