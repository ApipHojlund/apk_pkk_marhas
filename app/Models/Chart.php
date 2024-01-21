<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_produk',
        'id_customer',
        'jumlah_barang',
        'total_harga',
    ];

    protected $primaryKey = 'id';

    public function Transaksiu()
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi', 'id');
    }

    public function Product()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id');
    }
    public function Pemesan()
    {
        return $this->belongsTo(User::class, 'id_customer', 'id');
    }
}
