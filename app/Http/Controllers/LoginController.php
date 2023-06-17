<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index() {
        if (Auth::guard('sensei')->check()) {
            return redirect()->route('dashboard.sensei');
        } elseif (Auth::guard('sekretaris')->check()) {
            return redirect()->route('dashboard.sekretaris');
        } elseif (Auth::guard('schale')->check()) {
            return redirect()->route('dashboard.schale');
        }

        return view('page2-login.login');
    }
    public function authSensei(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (Auth::guard('sensei')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard.sensei'));
        }
        return back()->with('loginError', 'Login Gagal!')->onlyInput('username');
    }
    public function authSekretaris(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (Auth::guard('sekretaris')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard.sekretaris'));
        }
        return back()->with('loginError', 'Login Gagal!')->onlyInput('username');
    }
    public function authSchale(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (Auth::guard('schale')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard.schale'));
        }
        return back()->with('loginError', 'Login Gagal!')->onlyInput('username');
    }
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
