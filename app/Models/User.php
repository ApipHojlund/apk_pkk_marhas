<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'no_telp',
        'alamat',
        'username',
        'password',
        'foto',
        'level',
    ];
    protected $primaryKey = 'id';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function User()
    {
        return $this->hasMany(User::class, 'id_user', 'id');
    }
    public function Seller()
    {
            return $this->belongsTo(User::class, 'id_seller', 'id');
    }
    public function Customer()
    {
        return $this->belongsTo(User::class, 'id_customer', 'id');
    }
    public function Pemesan()
    {
        return $this->belongsTo(User::class, 'id_customer', 'id');
    }
}
