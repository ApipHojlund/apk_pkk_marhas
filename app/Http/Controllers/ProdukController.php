<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenis_produk;
use App\Models\Produk;
use App\Models\User;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::all();
        return view('home.produk.index',compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $seller = User::where('level','=','seller')->get();
        $jenis = Jenis_produk::all();
        return view('home.produk.tambah',compact('jenis','seller'));
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
        $img->move('image/produk/',$foto);

        $zero = '0';

        Produk::create([
            'nama' => $request-> nama,
            'harga' => $request -> harga,
            'stok' => $request -> stok,
            'deskripsi' => $request -> deskripsi,
            'foto' => $foto,
            'terjual' => $zero,
            'id_jenis' => $request -> id_jenis,
            'id_seller' => $request -> id_seller,
            $request->except('_token'),
        ]);
        return redirect('/produk');
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
        $seller = User::where('level','=','seller')->get();
        $produk = Produk::find($id);
        $jenis = Jenis_produk::all();
        return view('home.produk.edit',compact('seller','produk','jenis'));
    }

    public function detail($id)
    {
        $produk = Produk::find($id);
        return view('home.produk.detail',compact('produk'));
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
        $img->move('image/produk/',$foto);
        
        $produk = Produk::find($id);

        $produk->update([
            'nama' => $request-> nama,
            'harga' => $request -> harga,
            'deskripsi' => $request -> deskripsi,
            'foto' => $foto,
            'stok' => $request -> stok,
            'terjual' => $produk->terjual,
            'id_jenis' => $request -> id_jenis,
            'id_seller' => $request -> id_seller,
            $request->except('_token'),
        ]);
        return redirect('/produk');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::find($id);
        $produk->delete();
        return redirect('/produk');
    }
}
