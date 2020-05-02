<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Services\AuthService;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    use AuthenticatesUsers;
    private $authService;
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    public function login(Request $request)
    {
        $data = $this->validateLogin($request);
        $mhsLogin = preg_match("/(([0-9]){8})/", $data['username']);
        if ($mhsLogin) {
            $res = $this->authService->mahasiswaLogin($data);
        } else {
            $res = $this->authService->pengurusLogin($data);
        }
        if ($res) {
            if (Auth::guard('mahasiswa')->check()) {
                return redirect()->intended('/mahasiswa/home');
            } else if (Auth::guard('admin')->check()) {
                return redirect()->intended('/admin/home');
            } else if (Auth::guard('kaprodi')->check()) {
                return redirect()->intended('/kaprodi/home');
            } else if (Auth::guard('dosen')->check()) {
                return redirect()->intended('/dosen/home');
            };
        }
        return $this->sendFailedLoginResponse($request);
    }

    protected function validateLogin(Request $request)
    {
        return $request->validate([
            $this->username() => ['required', 'string', 'regex:/(([0-9]){8})|(^.+@.+$)/'],
            'password' => 'required|string',
        ]);
    }
}
