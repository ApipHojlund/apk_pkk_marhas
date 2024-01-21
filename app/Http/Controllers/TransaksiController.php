<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Detail_transaksi;
use App\Models\Produk;
use App\Models\User;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::all();
        return view('home.transaksi.index',compact('transaksi'));
    }
    public function cetak()
    {
        $transaksi = Transaksi::all();
        return view('home.transaksi.cetak',compact('transaksi'));
    }

    public function struk($id)
    {
        $transaksi = Transaksi::find($id);
        return view('home.transaksi.struk',compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $detail = Detail_transaksi::all();
        $detail = Detail_transaksi::where('status','=','in order')->get();
        return view('home.transaksi.tambah',compact('detail'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->id_pesanan;
        $pesanan = Detail_transaksi::find($id);

        $paid_off = 'paid off';

        $transaksi = Transaksi::create([
            'tanggal' => $request->tanggal,
            'status' => $request->status,
            'keterangan' => ($request->total_bayar >= $pesanan->total_harga) ? 'Berhasil' : 'Gagal',
            'total_bayar' => $request->total_bayar,
            'kembalian' => $request->total_bayar - $pesanan->total_harga,
            'id_user' => Auth()->User()->id,
            'id_pesanan' => $request->id_pesanan,
        ]);

        $pesanan->update([
            'status' => $paid_off,
            $request->except('_token'),
        ]);

        // $transaksi->Pesanan()->attach($request->id_pesanan);

        return redirect('/transaksi')->with('success', 'Transaksi berhasil ditambahkan');
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
        // $transaksi = Detail_transaksi::find($id);
        $transaksi = Transaksi::find($id);
        $detail = Detail_transaksi::where('status','=','in order')->get();
        return view('home.transaksi.edit',compact('detail','transaksi'));
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
        $idp = $request->id_pesanan;
        $pesanan = Detail_transaksi::find($idp);
        $transaksi = Transaksi::find($id);
        $transaksi->update([
            'tanggal' => $request->tanggal,
            'status' => $request->status,
            'total_bayar' => $request->total_bayar,
            'kembalian' => $request->total_bayar - $pesanan->total_harga,
            'id_user' => Auth()->User()->id,
        ]);

        return redirect('/transaksi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->delete();
        return redirect('/transaksi');
    }

    public function detail($id)
    {
        $totalHarga = Detail_transaksi::where('id_transaksi','=', $id)->sum('total_harga');
        $detail = Detail_transaksi::where('id_transaksi','=',$id)->first();
        return view('home.transaksi.detail',compact('detail','totalHarga'));
    }
}
