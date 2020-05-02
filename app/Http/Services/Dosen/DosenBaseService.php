<?php

namespace App\Http\Services\Dosen;

use App\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DosenBaseService
{
    private $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function find($id)
    {
        return Dosen::find($id);
    }

    public function getPaginate($total = 5)
    {
        return Dosen::paginate($total);
    }

    public function insert()
    {
        $res = $this->request->validate($this->rules());
        $res['password'] = Hash::make($res['password']);
        $dosen = Dosen::create($res);
        return $dosen;
    }

    public function update(Dosen $dosen, $type = 'profile')
    {
        if ($type == 'profile') {
            $res = $this->request->validate($this->rules('update', $dosen));
        }
        if ($type == 'password') {
            $res = $this->request->validate($this->rules('password', $dosen));
            $dosen->password = Hash::make($this->request->password);
        }

        if ($dosen->email != $this->request->email) {
            $dosen->email = $this->request->email;
        }

        $dosen->nama = $this->request->nama;
        return $dosen->saveOrFail();
    }

    public function delete(Dosen $dosen)
    {
        $res = $dosen->delete();
        return $res;
    }

    public function rules(...$params)
    {
        $rules = [
            'nama' => 'required',
            'email' => 'required|email|unique:dosen',
            'password' => 'required|confirmed',
        ];

        if ($params != null) {
            if ($params[0] == 'update') {
                $rules['email'] = $rules['email'] . ',id,' . $params[1]->id;
                unset($rules['password']);
            }
            if ($params[0] == 'password') {
                $rules['email'] = $rules['email'] . ',id,' . $params[1]->id;
            }
        }

        return $rules;
    }
}
