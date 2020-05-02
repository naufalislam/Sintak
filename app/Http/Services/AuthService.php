<?php

namespace App\Http\Services;

use App\Admin;
use App\Dosen;
use App\Kaprodi;
use Illuminate\Support\Facades\Auth;

class AuthService
{

    public function mahasiswaLogin($data)
    {
        $mhs['nim'] = $data['username'];
        $mhs['password'] = $data['password'];
        $res = $this->attemptLogin('mahasiswa', $mhs);
        if ($res) {
            return $mhs;
        }
        return false;
    }

    public function pengurusLogin($data)
    {
        $guard = null;

        $pengurus['email'] = $data['username'];
        $pengurus['password'] = $data['password'];

        $admin = Admin::where('email', '=', $pengurus['email'])->get();
        $dosen = Dosen::where('email', '=', $pengurus['email'])->get();
        $kaprodi = Kaprodi::where('email', '=', $pengurus['email'])->get();

        if (!$admin->isEmpty()) {
            $guard = 'admin';
        } elseif (!$dosen->isEmpty()) {
            $guard = 'dosen';
        } elseif (!$kaprodi->isEmpty()) {
            $guard = 'kaprodi';
        };

        if ($guard != null) {
            $res = $this->attemptLogin($guard, $pengurus);
            if ($res) {
                return $pengurus;
            }
        }
        return false;
    }

    public function attemptLogin($guard = null, $data = null)
    {
        return Auth::guard($guard)->attempt($data);
    }
}
