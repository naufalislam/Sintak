<?php

namespace App\Http\Controllers\Admin;

use App\Dosen;
use App\Http\Controllers\Controller;
use App\Http\Services\Dosen\DosenBaseService;
use Illuminate\Http\Request;

class ManagemenDosenController extends Controller
{
    private $dosenService;

    public function __construct(DosenBaseService $dosenService)
    {
        $this->dosenService = $dosenService;
    }

    public function index()
    {
        $dosen = $this->dosenService->getPaginate(5);
        return view('admin.managemen_user.dosen.index', compact('dosen'));
    }
    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(Dosen $kaprodi)
    {
    }

    public function edit(Dosen $dosen)
    {
        return view('admin.managemen_user.dosen.edit', compact('dosen'));
    }

    public function update(Request $request, Dosen $dosen)
    {
        if ($request->password != null) {
            $res = $this->dosenService->update($dosen, 'password');
        } else {
            $res = $this->dosenService->update($dosen);
        }
        if ($res) {
            return redirect()->route('admin.managemen.dosen.index')->withSuccess('Berhasil di edit');
        }
    }

    public function destroy(Dosen $dosen)
    {
        $res = $this->dosenService->delete($dosen);
        if ($res) {
            return redirect()->back()->withSuccess('Berhasil di hapus');
        }
        return redirect()->back()->withErrors('Gagal dihapus');
    }
}
