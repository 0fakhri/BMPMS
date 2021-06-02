<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function indexOwner()
    {
        return view('owner.index');
    }

    public function indexManajer()
    {
        return view('manajer.dashboard');
    }

    public function indexMarketing()
    {
        return view('marketing.dashboard');
    }

    public function indexKeuangan()
    {
        return view('keuangan.dashboard');
    }

    public function indexKontraktor()
    {
        return view('owner.index');
    }

    public function indexSupplier()
    {
        return view('owner.index');
    }
}
