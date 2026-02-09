<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';
    public $timestamps = false;

    protected $fillable = [
    'id_petugas',
    'id_siswa',
    'tanggal_bayar',
    'bulan_bayar',
    'tahun_bayar',
    'bantuan',
    'id_spp',
    'jumlah_bayar'
];


    // RELASI
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'id_petugas');
    }

    public function spp()
    {
        return $this->belongsTo(Spp::class, 'id_spp');
    }
}
