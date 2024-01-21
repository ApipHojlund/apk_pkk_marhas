<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;
use App\Models\User;
use App\Models\Produk;

class LoginController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return view('home.desktop',compact('produk'));
    }
    public function create()
    {
        return view('home.register');
    }
    public function kelogin()
    {
        return view('home.login');
    }
    public function store(Request $request)
    {
        $img = $request->file('foto');
        $nama = hexdec(uniqid());
        $ext = strtolower($img->getClientOriginalExtension());
        $foto = $nama.'.'.$ext;
        $img->move('image/user/',$foto);
        
        User::create ([
            'nama' => $request -> nama,
            'no_telp' => $request -> no_telp,
            'alamat' => $request -> alamat,
            'username' => $request -> username,
            'foto' => $foto,
            'password' => bcrypt($request -> password),
            'level' => $request -> level
        ]);
        return redirect('/login');
    }

    public function login(Request $request)
    {
        if(Auth::attempt($request->only('username','password'))){
            return redirect('/dashboard');
        }else{
            return redirect('/login')->withInput($request->only('username'))
            ->with('error', 'Username atau Password Salah')
            ->with('message', 'Username atau Password Salah');;
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
