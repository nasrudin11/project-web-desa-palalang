<?php

namespace App\Http\Controllers;

use App\Models\Homepage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        $data = Homepage::first();
        return view('login', ['title' => 'Login'], compact('data'));
    }

    public function authenticate(Request $request)
    {
        // Validasi kredensial
        $credentials = $request->validate([
            // 'email' => 'required|email:dns',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Cek kredensial
        if (Auth::attempt($credentials)) {
            
            $request->session()->regenerate();
            return redirect()->intended('/dashboard-admin');
        }

        // Kembalikan pesan login gagal
        return back()->with('loginError', 'Login failed!');
    }


    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }
}
