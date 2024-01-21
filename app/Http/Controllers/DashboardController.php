<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenis_produk;
use App\Models\Produk;
use App\Models\Detail_transaksi;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    
    public function index()
    {
        $jumlah_jenis = Jenis_produk::count();
        $jumlah_produk = Produk::count();
        $jumlah_pesanan = Detail_transaksi::count();
        $jumlah_trans = Transaksi::count();
        $transaksi = Transaksi::Select()->orderBy('tanggal','desc')
        ->limit(5)
        ->get();
        $today = Carbon::today();
        $start = Carbon::today()->subDays(7);
        $total_minggu = Transaksi::Select(Transaksi::raw('SUM(total_bayar) as total_price'))
                ->whereBetween('tanggal',[$start,$today])->first();
        $produkTerlaris = Produk::orderBy('terjual', 'desc')->limit(5)->get();
        return view('home.dashboard',compact('jumlah_trans','produkTerlaris','jumlah_jenis','jumlah_produk','jumlah_pesanan','transaksi'),['total_minggu'=>$total_minggu]);
    }
}
