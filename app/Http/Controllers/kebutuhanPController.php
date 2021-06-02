<?php

namespace App\Http\Controllers;

use App\kebutuhanP;
use App\materialP;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class kebutuhanPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $KebutuhanP = kebutuhanP::all();
        if (auth()->user()->role == 'Owner') {
            return view('owner.proyek', compact('KebutuhanP'));
        } elseif (auth()->user()->role == 'Manajer') {
            return view('manajer.kebutuhan_proyek', compact('KebutuhanP'));
        } elseif (auth()->user()->role == 'Kontraktor') {
            return view('owner.proyek', compact('KebutuhanP'));
        }
    }

    public function download($id)
    {
        $cari = kebutuhanP::findorfail($id);
        $file = public_path('/fileupload/Doc_KP/') . $cari->Doc_KP;
        return response()->download($file);
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
            'TanggalPengajuan' => 'required',
            'TotalNominal' => 'required',
            'Doc_KP' => 'required'
        ]);

        $Doc_KP = $request->Doc_KP;
        $nama_DocKP = date('Y-m-d-h-i-s') . $Doc_KP->getClientOriginalName();

        DB::table('kebutuhan_proyek')->insert([
            'TanggalPengajuan' => $request->TanggalPengajuan,
            'PenanggungJawab' => auth()->user()->name,
            'TotalNominal' => $request->TotalNominal,
            'Doc_KP' => $nama_DocKP,
            'StatusPersetujuan' => 'Belum Disetujui',
            'User_UserID' => auth()->user()->id
        ]);

        $Doc_KP->move(public_path() . '/fileupload/Doc_KP', $nama_DocKP);
        return back()->with('sukses', 'Data Kebutuhan Proyek Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kebutuhanP  $kebutuhanP
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $MaterialProyek = materialP::where('KebutuhanProyek_KP_ID', $id)->get();
        $detail_kebutuhan = kebutuhanP::findorfail($id);
        return view('owner.detail_kebutuhan', compact('detail_kebutuhan', 'MaterialProyek'));
    }

    public function verifKP(Request $request, $id)
    {
        kebutuhanP::where('KP_ID', $id)
            ->update([
                'StatusPersetujuan' => $request->StatusPersetujuan
            ]);
        return back()->with('sukses', 'Kebutuhan Proyek Berhasil Diverifikasi');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kebutuhanP  $kebutuhanP
     * @return \Illuminate\Http\Response
     */
    public function edit(kebutuhanP $kebutuhanP)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kebutuhanP  $kebutuhanP
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'TanggalPengajuan' => 'required',
            'PenanggungJawab' => 'required',
            'TotalNominal' => 'required',
            'Doc_KP' => 'required',
            'StatusPersetujuan' => 'required'
        ]);

        $hapus = kebutuhanP::findorfail($id);
        $file = public_path('/fileupload/Doc_KP/') . $hapus->Doc_KP;

        $Doc_KP = $request->Doc_KP;
        $nama_DocKP = date('Y-m-d-h-i-s') . $Doc_KP->getClientOriginalName();

        kebutuhanP::where('KP_ID', $id)
            ->update([
                'TanggalPengajuan' => $request->TanggalPengajuan,
                'PenanggungJawab' => $request->PenanggungJawab,
                'TotalNominal' => $request->TotalNominal,
                'Doc_KP' => $nama_DocKP,
                'StatusPersetujuan' => $request->StatusPersetujuan
            ]);

        @unlink($file);
        $Doc_KP->move(public_path() . '/fileupload/Doc_KP', $nama_DocKP);
        return back()->with('sukses', 'Kebutuhan Proyek Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kebutuhanP  $kebutuhanP
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = kebutuhanP::findorfail($id);
        $file = public_path('/fileupload/Doc_KP/') . $hapus->Doc_KP;

        $hapus->delete();
        return back()->with('sukses', 'Data Kebutuhan Proyek Berhasil Dihapus');
    }
}
