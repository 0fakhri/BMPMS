<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\ServiceProvider;

class home extends Controller
{


  public function index()
  {
    if (auth()->user()->role == 'Owner') {
      return redirect('/owner');
    } elseif (auth()->user()->role == 'Manajer') {
      return redirect('/manajer');
    } elseif (auth()->user()->role == 'Supplier') {
      return redirect('/supplier');
    } elseif (auth()->user()->role == 'Kontraktor') {
      return redirect('/kontraktor');
    } elseif (auth()->user()->role == 'Divisi Marketing') {
      return redirect('/divmarketing');
    } elseif (auth()->user()->role == 'Divisi Keuangan') {
      return redirect('/divkeuangan');
    }
  }
}
