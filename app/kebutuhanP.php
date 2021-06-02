<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kebutuhanP extends Model
{
    protected $table = 'kebutuhan_proyek';
    protected $primaryKey = 'KP_ID';
    protected $fillable = [
        'TanggalPengajuan', 'PenanggungJawab', 'TotalNominal', 'Doc_KP', 'StatusPersetujuan', 'User_UserID'
    ];
}
