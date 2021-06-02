<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class legalitas extends Model
{
    protected $table = 'legalitas';
    protected $primaryKey = 'LegalitasID';
    protected $fillable = [
        'No_Legalitas', 'TanggalTerbit', 'No_Unit', 'StatusLegalitas', 'SPR_SPR_ID'
    ];
}
