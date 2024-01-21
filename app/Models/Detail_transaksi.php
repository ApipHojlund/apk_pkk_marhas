<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_transaksi',
        'id_produk',
        'id_customer',
        'jumlah_barang',
        'total_harga',
    ];

    protected $primaryKey = 'id';

    public function Transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi', 'id');
    }

    public function Produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id');
    }
    public function Customer()
    {
        return $this->belongsTo(User::class, 'id_customer', 'id');
    }
}
