<?php

namespace App\Http\Controllers;

use App\tipeperumahan;
use Illuminate\Http\Request;

class tipePerumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipeperumahan = tipeperumahan::all();
        if (auth()->user()->role == 'Manajer') {
            return view('manajer.tipePerumahan', compact('tipeperumahan'));
        } elseif (auth()->user()->role == 'Divisi Marketing') {
            return view('marketing.tipePerumahan', compact('tipeperumahan'));
        } elseif (auth()->user()->role == 'Owner') {
            return view('owner.tipe_perumahan', compact('tipeperumahan'));
        }
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
            'LuasTanah' => 'required',
            'LuasBangunan' => 'required',
            'Harga' => 'required'
        ]);
        tipeperumahan::create($request->all());
        return back()->with('sukses', 'Data Tipe Perumahan Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tipeperumahan  $tipeperumahan
     * @return \Illuminate\Http\Response
     */
    public function show(tipeperumahan $tipeperumahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tipeperumahan  $tipeperumahan
     * @return \Illuminate\Http\Response
     */
    public function edit(tipeperumahan $tipeperumahan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tipeperumahan  $tipeperumahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'LuasTanah_edit' => 'required',
            'LuasBangunan_edit' => 'required',
            'NamaTipe_edit' => 'required',
            'Harga_edit' => 'required'
        ]);
        tipeperumahan::where('TipeID', $id)
            ->update([
                'NamaTipe' => $request->NamaTipe_edit,
                'LuasTanah' => $request->LuasTanah_edit,
                'LuasBangunan' => $request->LuasBangunan_edit,
                'Harga' => $request->Harga_edit
            ]);

        return back()->with('sukses', 'Data Tipe Perumahan Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tipeperumahan  $tipeperumahan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tipeperumahan::destroy($id);
        return back()->with('sukses', 'Data Perumahan Berhasil Dihapus');
    }
}
