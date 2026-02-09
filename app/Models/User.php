<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Petugas;

class User extends Authenticatable
{
    protected $table = 'users';
    protected $primaryKey = 'id_user';

    protected $fillable = [
        'username',
        'password',
        'role'
    ];

    protected $hidden = [
        'password',
    ];

    public $timestamps = false;

    public function petugas()
    {
        return $this->hasOne(Petugas::class, 'id_user', 'id_user');
    }

    public function siswa()
    {
        return $this->hasOne(\App\Models\Siswa::class, 'id_user', 'id_user');
    }
}
