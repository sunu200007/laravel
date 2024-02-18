<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
//use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('login');
    }
    public function register()
    {
        return view('register');
    }
    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            if(Auth::user()->status != 'active'){

                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                session::flash('status', 'failed');
                session::flash('message', 'Akun anda belum aktif, silahkan hubungi admin');
                return redirect('/login');

            }
            $request->session()->regenerate();
            if(Auth::user()->role_id == 1) {
                return redirect('dashboard');
            }
            if(Auth::user()->role_id == 2) {
                return redirect('profile');
            }
        }
        session::flash('status', 'failed');
        session::flash('message', 'Login Gagal');
        return redirect('/login');

    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
    public function registerProcess(Request $request)  {
        $validated = $request->validate([
            'username' => 'required|unique:users|max:255',
            'password' => 'required|max:255',
            'phone' => 'max:255',
            'address' => 'required',
        ]);

        $request->password = Hash::make($request->password);
        $user = User::create($request->all());

        session::flash('status', 'success');
        session::flash('message', 'Regristrasi berhasil, silahkan tunggu aktivasi dari admin');
        return redirect('register');
    }
}
