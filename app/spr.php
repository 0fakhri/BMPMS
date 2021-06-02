<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class spr extends Model
{
    protected $table = 'spr';
    protected $primaryKey = 'SPR_ID';
    protected $fillable = ['No_SPR', 'TanggalSPR', 'UangMuka', 'Keterangan', 'StatusSPR', 'Konsumen_KonsumenID', 'TipePerumahan_TipeID'];
}
