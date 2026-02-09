<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Siswa; 

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';
    public $timestamps = false;

    protected $fillable = [
        'nama_kelas',
        'kompetensi_keahlian'
    ];

    // RELASI: 1 Kelas punya banyak Siswa
    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'id_kelas', 'id_kelas');
    }
}
