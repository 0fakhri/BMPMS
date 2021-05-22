<?php

namespace App\Http\Controllers;

use App\konsumen;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class konsumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataKonsumen = konsumen::all();
        return view('manajer.konsumen', compact('dataKonsumen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'NamaLengkap' => 'required',
            'TanggalLahir' => 'required',
            'JenisKelamin' => 'required',
            'Alamat' => 'required',
            'Email' => 'required|unique:users,email',
            'Telepon' => 'required',
            'FotoKTP' => 'required'
        ]);

        $FotoKTP = $request->FotoKTP;
        $nama_FotoKTP = date('Y-m-d-h-i-s') . $FotoKTP->getClientOriginalName();

        DB::table('konsumen')->insert([
            'NamaLengkap' => $request->NamaLengkap,
            'TanggalLahir' => $request->TanggalLahir,
            'JenisKelamin' => $request->JenisKelamin,
            'Alamat' => $request->Alamat,
            'Email' => $request->Email,
            'Telepon' => $request->Telepon,
            'FotoKTP' => $nama_FotoKTP,
            'User_UserID' => auth()->user()->id
        ]);
        $FotoKTP->move(public_path() . '/img', $nama_FotoKTP);
        return redirect('/konsumen')->with('sukses', 'Data Konsumen Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\konsumen  $konsumen
     * @return \Illuminate\Http\Response
     */
    public function show(konsumen $konsumen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\konsumen  $konsumen
     * @return \Illuminate\Http\Response
     */
    public function edit(konsumen $konsumen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\konsumen  $konsumen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, konsumen $konsumen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\konsumen  $konsumen
     * @return \Illuminate\Http\Response
     */
    public function destroy(konsumen $konsumen)
    {
        //
    }
}
