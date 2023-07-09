<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session as sesi;

class AuthController extends Controller
{
    public function login()
    {
        $user = User::get();
        return view('layouts\login', ['user' => $user]);

    }

    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $success = array
                (
                'message' => 'Login Berhasil',
                'alert-type' => 'success',
            );
            return redirect()->intended('/')->with($success);
        }

        sesi::flash('status', 'failed');
        sesi::flash('message', 'Login Gagal !');

        return redirect('/login');
    }

    public function logout(Request $request)
    {
      Auth::logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();
      return redirect('/login');
    }
}
