<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function login()
    {
        return view('login.login');
    }

    public function postLogin(Request $request)
    {
        if (Auth::attempt($request->only('username', 'password'))) {
            return redirect('/');
        }
        return redirect('/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

    public function registrasi()
    {
        return view('login.registrasi');
    }

    public function postRegistrasi(Request $request)
    {
        User::create([
            'foto' => $request->file('foto')->store('user', 'public'),
            'nama' => $request->nama,
            'nik' => $request->nik,
            'level' => 'user',
            'username' => $request->username,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'jenis_kelamin' =>$request->jenis_kelamin,
            'tanggal_lahir' =>$request->tanggal_lahir,
            'alamat' =>$request->alamat,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);
        
        return redirect('/login');
    }
}
