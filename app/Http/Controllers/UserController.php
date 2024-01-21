<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaksi;
use App\Models\Detail_transaksi;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('home.user.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.user.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            'password' => bcrypt($request -> password),
            'level' => $request -> level,
            'foto' => $foto,
            $request->except('_token')
        ]);
        return redirect('/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('home.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $img = $request->file('foto');
        $nama = hexdec(uniqid());
        $ext = strtolower($img->getClientOriginalExtension());
        $foto = $nama.'.'.$ext;
        $img->move('image/user/',$foto);

        $user = User::find($id);
        $user->update([
            'nama' => $request -> nama,
            'no_telp' => $request -> no_telp,
            'alamat' => $request -> alamat,
            'username' => $request -> username,
            'password' => bcrypt($request -> password),
            'level' => $request -> level,
            'foto' => $foto,
            $request->except('_token')
        ]);
        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/user');
    }

    public function history()
    {
        $transaksi = Transaksi::where('id_user','=',Auth()->User()->id)->get();
        // $transaksi = Transaksi::where('id_transaki','=',;
        $terpesan = Detail_transaksi::where('status','=','paid off')->get();
        return view('home.user.history',compact('transaksi','terpesan'));
    }

    public function profile($id)
    {
        $profile = User::find($id);
        return view('home.user.profile',compact('profile'));
    }
}
