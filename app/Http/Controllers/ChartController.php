<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenis_produk;
use App\Models\Produk;
use App\Models\Detail_transaksi;
use App\Models\Transaksi;
use App\Models\Chart;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Auth;

class ChartController extends Controller
{
    public function index(Request $request)
    {
        $jenis = Jenis_produk::all();
        $keyword = $request->input('keyword');
        $produk = Produk::where('nama', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('harga', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('stok', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('terjual', 'LIKE', '%' . $request->search . '%')
                                ->get();
        return view('home.chart.hasil',compact('produk','keyword'));
    }

    public function inchart()
    {
        $idc = Auth()->User()->id;
        $detail = Chart::where('id_customer', '=', $idc)
                        ->get();
        $jumlah_total = Chart::where('id_customer', '=', $idc)
                        ->selectRaw('SUM(total_harga) as total_price')
                        ->first();                         
        return view('home.user.chart',compact('detail'),['jumlah_total'=>$jumlah_total]);
    }

    public function store(Request $request, $id)
    {
        // $kode_transaksi = $this->generateKodeTransaksi();

        $produk = Produk::find($id);
        
        $siji = '1';
        $in_order = 'Dalam Keranjang';

        $today = Carbon::today();

        Chart::create([
            'id_produk' => $produk->id,
            'id_customer' => Auth()->User()->id,
            'jumlah_barang' => $siji,
            'total_harga' => $produk->harga * $siji,
            'status' => $in_order,
            $request->except('_token'),
        ]);

        // $detail = $request;

        // Transaksi::create([
        //     'id' => $kode_transaksi,
        //     'tanggal' => $today,
        //     'status' => 'dalam antrian',
        //     'total_bayar' => 0,
        //     'kembalian' => 0,
        // ]);
        return redirect('/dashboard')->with('success', 'Pesanan Anda Sudah Terkirim')
        ->with('message', 'Pesanan Anda Sudah Terkirim');
    }

    private function generateKodeTransaksi()
    {
        // Logika untuk menghasilkan kode transaksi secara acak
        return  mt_rand(100000, 999999);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'jumlah_barang.*' => 'required|integer|min:1', // Validasi jumlah barang
        ]);
    
        $selectedItems = $request->input('selected_items', []);
        $jumlahBarang = $request->input('jumlah_barang', []);
    
        foreach ($selectedItems as $itemId) {
            $item = Chart::find($itemId);
    
            // Update jumlah barang
            $item->update([
                'jumlah_barang' => $jumlahBarang[$itemId],
                'total_harga' => $item->produk->harga * $jumlahBarang[$itemId],
            ]);
        }

    return redirect('/produk')->with('success', 'Keranjang berhasil diperbarui');
}

    public function delete($id)
    {
        $chart = Chart::find($id);
        $chart->delete();
        return redirect('/user/keranjang/{id}');
    }

    public function checkout(Request $request)
    {
        $today = Carbon::today();
        $kode_transaksi = $this->generateKodeTransaksi();
        // Ambil data item yang dipilih dari checkbox
        $selectedItems = $request->input('selected_items', []);

        // Simpan data ke tabel detail_transaksi
        foreach ($selectedItems as $itemId) {
            $item = Chart::find($itemId);
            // $idc = $itemId; 
            // $chart = Chart::find($idc);
            // Simpan data ke tabel transaksi
            $transaksi = Transaksi::create([
            'tanggal' => $today,
            'total_bayar' => $request->total_bayar,
            'id_user' => Auth()->User()->id,
            'kembalian' => $request->total_bayar - $item->total_harga,
            'status' => ($request->total_bayar >= $item->total_harga) ? 'Berhasil' : 'Gagal',
            'id' => $kode_transaksi,
        ]);

            $jumlah_new = $request->jumlah_barang;

            Detail_transaksi::create([
                'id_transaksi' => $transaksi->id,
                'id_produk' => $item->id_produk,
                'id_customer' => $item->id_customer,
                'jumlah_barang' => $item->jumlah_barang,
                'total_harga' => $item->Product->harga * $item->jumlah_barang,
                $request->except('_token')
                // ... Data Lainnya ...
            ]);

            // $Jumlahlama = $item->jumlah_barang;
            // $Jumlahbaru = $request->jumlah_barang;

            // $selisih = $Jumlahbaru - $Jumlahlama;

            $id_produk = $item->id_produk;
            $idp = $id_produk;
            $produk = Produk::find($idp);
        
            $produk->update([
                'stok' => $produk->stok - array_sum($jumlah_new),
                'terjual' => $produk->terjual + array_sum($jumlah_new),
                 $request->except('_token'),
             ]);

            // Hapus item dari keranjang setelah checkout
            $item->delete();
        }

        // Redirect atau tampilkan informasi lainnya sesuai kebutuhan
        return redirect('/dashboard')->with('success', 'Checkout berhasil');
    }
}
