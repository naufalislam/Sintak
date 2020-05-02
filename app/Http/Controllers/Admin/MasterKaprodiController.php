<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Kaprodi\KaprodiBaseService;
use App\Http\Services\Mahasiswa\MahasiswaBaseService;
use Illuminate\Http\Request;

class MasterKaprodiController extends Controller
{
    private $kaprodiService;

    public function __construct(KaprodiBaseService $kaprodiService)
    {
        $this->kaprodiService = $kaprodiService;
    }

    public function index()
    {
        $kaprodi = $this->kaprodiService->getPaginate();
        return view('admin.master.kaprodi.index', compact('kaprodi'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $res = $this->kaprodiService->insert();
        if ($res) {
            return redirect()->back()->withSuccess('Berhasil');
        }
    }

    public function show($id)
    {
        $kaprodi = $this->kaprodiService->find($id);
        return view('admin.master.kaprodi.show', compact('kaprodi'));
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
