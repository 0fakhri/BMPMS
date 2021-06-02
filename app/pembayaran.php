<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    protected $table = 'transaksi_pembayaran';
    protected $primaryKey = 'TransaksiID';
    protected $fillable = ['TanggalTransaksi', 'NominalTransaksi', 'SisaPembayaran', 'BuktiPembayaran', 'Keterangan', 'StatusPembayaran', 'Legalitas_LegalitasID', 'SPR_SPR_ID'];
}
