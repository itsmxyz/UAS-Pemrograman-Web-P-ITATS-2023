<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index() {
        if (Auth::guard('sensei')->check())
            return redirect()->route('sensei.dashboard');
        elseif (Auth::guard('sekretaris')->check())
            return redirect()->route('sekretaris.dashboard');
        elseif (Auth::guard('schale')->check()){
            return redirect()->route('schale.dashboard');
        }
        return view('page2-login.login-choice');
    }
    public function authSensei(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (!$credentials){
            return back()->withErrors([
                'username' => 'Username tidak boleh kosong!',
                'password' => 'Passowrd tidak boleh kosong!',
            ])->onlyInput('username');
        }
        else{
            if (Auth::guard('sensei')->attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended(route('sensei.dashboard'));
            }
            return back()->withErrors(['error'=>'Username atau Password salah!'])->onlyInput('username');
        }
    }
    public function authSekretaris(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (!$credentials){
            return back()->withErrors([
                'username' => 'Username tidak boleh kosong!',
                'password' => 'Passowrd tidak boleh kosong!',
            ])->onlyInput('username');
        }
        else{
            if (Auth::guard('sekretaris')->attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended(route('sekretaris.dashboard'));
            }
            return back()->withErrors(['error'=>'Error!'])->onlyInput('username');
        }
    }
    public function authSchale(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (!$credentials){
            return back()->withErrors([
                'username' => 'Username tidak boleh kosong!',
                'password' => 'Passowrd tidak boleh kosong!',
                ])->onlyInput('username');
        }
        else{
            if (Auth::guard('schale')->attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended(route('schale.dashboard'));
            }
            return back()->withErrors(['error'=>'Kelas gagal dihapus!'])->onlyInput('username');
        }
    }
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
