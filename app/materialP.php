<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class materialP extends Model
{
    protected $table = 'material_proyek';
    protected $primaryKey = 'MP_ID';
    protected $fillable = [
        'TanggalPengiriman', 'Doc_MP', 'StatusVerifikasi', 'KebutuhanProyek_KP_ID'
    ];
}
