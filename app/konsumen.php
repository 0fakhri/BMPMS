<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class konsumen extends Model
{
    protected $table = 'konsumen';
    protected $primaryKey = 'KonsumenID';
    protected $fillable = [
        'NamaLengkap', 'TanggalLahir', 'JenisKelamin', 'Alamat', 'Email', 'Telepon', 'FotoKTP', 'User_UserID'
    ];
}
