<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'total_harga',
        'tanggal',
        'status',
        'total_bayar',
        'kembalian',
        'id_user',
    ];  

    protected $primaryKey = 'id';

    public function Transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_transaksi', 'id');
    }
    public function User()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
