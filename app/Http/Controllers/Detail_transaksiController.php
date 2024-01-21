<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Detail_transaksi;
use App\Models\Produk;
use App\Models\User;

class Detail_transaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detail = Detail_transaksi::all();
        return view('home.pesanan.index',compact('detail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = User::where('level','=','customer')->get();
        $produk = Produk::all();
        return view('home.pesanan.tambah',compact('produk','customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_produk = $request->id_produk;
        $idp = $id_produk;
        $produk = Produk::find($idp);


        //$total = $produk->harga * $request->jumlah_barang;

        Detail_transaksi::create([
            'id_produk' => $request -> id_produk,
            'id_customer' => $request -> id_customer,
            'jumlah_barang' => $request -> jumlah_barang,
            'total_harga' => $produk->harga * $request->jumlah_barang,
            $request->except('_token'),
        ]);


        $produk->update([
           'stok' => $produk->stok - $request->jumlah_barang,
           'terjual' => $produk->terjual + $request->jumlah_barang,
            $request->except('_token'),
        ]);

        return redirect('/pesanan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pesanan = Detail_transaksi::find($id);
        $customer = User::where('level','=','customer')->get();
        $produk = Produk::all();
        return view('home.pesanan.edit',compact('produk','pesanan','customer'));
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
        $pesanan = Detail_transaksi::find($id);

        $Jumlahlama = $pesanan->jumlah_barang;
        $Jumlahbaru = $request->jumlah_barang;

        $selisih = $Jumlahbaru - $Jumlahlama;

        $id_produk = $request->id_produk;
        $idp = $id_produk;
        $produk = Produk::find($idp);

        $pesanan->update([
            'id_produk' => $request -> id_produk,
            'id_customer' => $request -> id_customer,
            'jumlah_barang' => $request -> jumlah_barang,
            'total_harga' => $produk->harga * $request->jumlah_barang,
            $request->except('_token'),
        ]);

        $produk->update([
            'stok' => $produk->stok - $selisih,
            'terjual' => $produk->terjual + $selisih,
            $request->except('_Token'),
        ]);

        return redirect('/pesanan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $detail = Detail_transaksi::find($id);
        
        $idp = $detail->id_produk;
        $produk = Produk::find($idp);
        
        $produk->update([
            'stok' => $produk->stok + $detail->jumlah_barang,
            'terjual' => $produk->terjual - $detail->jumlah_barang,
            $request->except('_token'),
        ]);
        
        $detail->delete();

        return redirect('/pesanan');
    }
}
