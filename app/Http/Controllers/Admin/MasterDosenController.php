<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Dosen\DosenBaseService;
use Illuminate\Http\Request;

class MasterDosenController extends Controller
{
    private $dosenService;

    public function __construct(DosenBaseService $dosenService)
    {
        $this->dosenService = $dosenService;
    }

    public function index()
    {
        $dosen = $this->dosenService->getPaginate();
        return view('admin.master.dosen.index', compact('dosen'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $res = $this->dosenService->insert();
        if ($res) {
            return redirect()->back()->withSuccess('Berhasil');
        }
    }

    public function show($id)
    {
        $dosen = $this->dosenService->find($id);
        return view('admin.master.dosen.show', compact('dosen'));
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
