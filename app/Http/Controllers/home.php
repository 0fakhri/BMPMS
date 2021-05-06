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
     return view ('/index');
  }

}
