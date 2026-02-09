<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Pembayaran;

class Petugas extends Model
{
    protected $table = 'petugas';
    protected $primaryKey = 'id_petugas';
    // HAPUS BARIS INI
    // public $timestamps = false;

    protected $fillable = [
        'nama_petugas',
        'no_telp',
        'id_user',
        'level'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'id_petugas', 'id_petugas');
    }
}
