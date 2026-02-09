<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';
    public $timestamps = false;

protected $fillable = [
    'nis',
    'nama',
    'alamat',
    'no_telp',
    'id_kelas',
    'id_spp',
    'bantuan',
];


    // RELASI
    public function kelas()
{
    return $this->belongsTo(Kelas::class, 'id_kelas', 'id_kelas');
}

public function spp()
{
    return $this->belongsTo(Spp::class, 'id_spp', 'id_spp');
}

public function user()
{
    return $this->belongsTo(User::class, 'id_user', 'id_user');
}

public function pembayaran()
{
    return $this->hasMany(Pembayaran::class, 'id_siswa', 'id_siswa');
}


}
