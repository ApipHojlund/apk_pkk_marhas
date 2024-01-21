<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
            'nama',
            'harga',
            'stok',
            'foto',
            'terjual',
            'deskripsi',
            'id_seller',
            'id_jenis',
    ];

    protected $primaryKey = 'id';
    
    
        public function Jenis_produk()
        {
            return $this->belongsTo(Jenis_produk::class, 'id_jenis', 'id');
        }
        public function Seller()
        {
            return $this->belongsTo(User::class, 'id_seller', 'id');
        }

        public function Produk()
        {
            return $this->hasMany(Produk::class, 'id_produk', 'id');
        }
        public function Product()
        {
            return $this->hasMany(Produk::class, 'id_produk', 'id');
        }
}
