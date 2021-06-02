<?php

namespace App\Http\Controllers;

use App\materialP;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class materialPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $MaterialProyek = materialP::all();
        return view('owner.materialP', compact('MaterialProyek'));
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
            'TanggalPengiriman' => 'required',
            'Doc_MP' => 'required'
        ]);

        $Doc_MP = $request->Doc_MP;
        $nama_DocMP = date('Y-m-d-h-i-s') . $Doc_MP->getClientOriginalName();

        DB::table('material_proyek')->insert([
            'TanggalPengiriman' => $request->TanggalPengiriman,
            'Doc_MP' => $nama_DocMP,
            'StatusVerifikasi' => 'Belum Diverifikasi',
            'KebutuhanProyek_KP_ID' => $request->KebutuhanProyek_KP_ID
        ]);

        $Doc_MP->move(public_path() . '/fileupload/Doc_MP', $nama_DocMP);
        return back()->with('sukses', 'Data Material Proyek Untuk Kebutuhan Proyek Ini Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\materialP  $materialP
     * @return \Illuminate\Http\Response
     */
    public function show(materialP $materialP)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\materialP  $materialP
     * @return \Illuminate\Http\Response
     */
    public function edit(materialP $materialP)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\materialP  $materialP
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, materialP $materialP)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\materialP  $materialP
     * @return \Illuminate\Http\Response
     */
    public function destroy(materialP $materialP)
    {
        //
    }

    public function download($id)
    {
        $cari = materialP::findorfail($id);
        $file = public_path('/fileupload/Doc_MP/') . $cari->Doc_MP;
        return response()->download($file);
    }

    public function material_setujui($id)
    {
        materialP::where('MP_ID', $id)
            ->update([
                'StatusVerifikasi' => 'Disetujui'
            ]);
        return back()->with('sukses', 'Data Material Proyek Berhasil Diverifikasi');
    }

    public function material_tolak($id)
    {
        materialP::where('MP_ID', $id)
            ->update([
                'StatusVerifikasi' => 'Ditolak'
            ]);
        return back()->with('sukses', 'Data Material Proyek Berhasil Diverifikasi');
    }
}
