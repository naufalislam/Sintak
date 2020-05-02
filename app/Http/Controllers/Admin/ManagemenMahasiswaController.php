<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Mahasiswa\MahasiswaBaseService;
use App\Mahasiswa;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ManagemenMahasiswaController extends Controller
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
                ->addColumn('aksi', function ($data) {
                    $btn = view('admin.managemen_user.mahasiswa.view.viewform', compact('data'));
                    return $btn;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }
        return view('admin.managemen_user.mahasiswa.index');
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(Mahasiswa $mahasiswa)
    {
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        return view('admin.managemen_user.mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        if ($request->password != null) {
            $res = $this->mhsService->update($mahasiswa, 'password');
        } else {
            $res = $this->mhsService->update($mahasiswa);
        }
        if ($res) {
            return redirect()->route('admin.managemen.mahasiswa.index')->withSuccess('Berhasil di edit');
        }
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $res = $this->mhsService->delete($mahasiswa);
        if ($res) {
            return redirect()->back()->withSuccess('Berhasil di hapus');
        }
        return redirect()->back()->withErrors('Gagal dihapus');
    }
}
