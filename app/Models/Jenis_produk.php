<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_produk extends Model
{
    protected $fillable = [
        'tipe',
    ];

    protected $primaryKey = 'id';

    public function Jenis_produk()
    {
        return $this->hasMany(Jenis_produk::class, 'id_jenis', 'id');
    }
}
