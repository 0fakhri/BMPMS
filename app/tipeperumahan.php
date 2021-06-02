<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipeperumahan extends Model
{
    protected $table = 'tipe_perumahan';
    protected $primaryKey = 'TipeID';
    protected $fillable = ['LuasTanah', 'LuasBangunan', 'Harga', 'NamaTipe'];
}
