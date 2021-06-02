<?php

namespace App\Http\Controllers;

use App\konsumen;
use App\spr;
use App\tipeperumahan;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class SPRController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spr = DB::table('spr')
            ->join('konsumen', 'spr.Konsumen_KonsumenID', '=', 'konsumen.KonsumenID')
            ->join('tipe_perumahan', 'spr.TipePerumahan_TipeID', 'tipe_perumahan.TipeID')
            ->select('konsumen.*', 'tipe_perumahan.*', 'spr.*')
            ->get();
        if (auth()->user()->role == 'Owner') {
            return view('owner.spr', compact('spr'));
        } elseif (auth()->user()->role == 'Manajer') {
            $tipeperumahan = tipeperumahan::all();
            $konsumen = konsumen::all();
            return view('manajer.spr', compact('konsumen', 'spr', 'tipeperumahan'));
        } elseif (auth()->user()->role == 'Divisi Keuangan') {
            return view('keuangan.spr', compact('spr'));
        } elseif (auth()->user()->role == 'Divisi Marketing') {
            $tipeperumahan = tipeperumahan::all();
            $konsumen = konsumen::all();
            return view('marketing.spr', compact('konsumen', 'spr', 'tipeperumahan'));
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
            'No_SPR' => 'required',
            'TipePerumahan_TipeID' => 'required',
            'TanggalSPR' => 'required',
            'UangMuka' => 'required',
            'Keterangan' => 'required',
            'StatusSPR' => 'required',
            'Konsumen_KonsumenID' => 'required'
        ]);

        DB::table('spr')->insert([
            'No_SPR' => $request->No_SPR,
            'TipePerumahan_TipeID' => $request->TipePerumahan_TipeID,
            'TanggalSPR' => $request->TanggalSPR,
            'UangMuka' => $request->UangMuka,
            'Keterangan' => $request->Keterangan,
            'StatusSPR' => $request->StatusSPR,
            'Konsumen_KonsumenID' => $request->Konsumen_KonsumenID
        ]);
        $SPR_ID = spr::all()->max('SPR_ID');

        DB::table('legalitas')->insert([
            'No_Unit' => $request->No_Unit,
            'StatusLegalitas' => 'Belum Diterbitkan',
            'SPR_SPR_ID' => $SPR_ID
        ]);
        return back()->with('sukses', 'Data SPR Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\spr  $spr
     * @return \Illuminate\Http\Response
     */
    public function show(spr $spr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\spr  $spr
     * @return \Illuminate\Http\Response
     */
    public function edit(spr $spr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\spr  $spr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, spr $spr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\spr  $spr
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = spr::where('SPR_ID', $id);
        $hapus->delete();
        return back()->with('sukses', 'Data SPR Berhasil Dihapus');
    }

    public function printpdf($id)
    {
        $data = DB::table('spr')
            ->join('konsumen', 'spr.Konsumen_KonsumenID', '=', 'konsumen.KonsumenID')
            ->join('tipe_perumahan', 'spr.TipePerumahan_TipeID', 'tipe_perumahan.TipeID')
            ->select('konsumen.*', 'tipe_perumahan.*', 'spr.*')
            ->where('spr.SPR_ID', $id)
            ->first();
        $html = view('marketing.pdf', compact('data'));

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'potrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
    }

    public function setujui_spr($id)
    {
        spr::where('SPR_ID', $id)
            ->update([
                'StatusSPR' => 'Disetujui'
            ]);
        return back()->with('sukses', 'Data SPR Berhasil Diverifikasi');
    }

    public function tolak_spr($id)
    {
        spr::where('SPR_ID', $id)
            ->update([
                'StatusSPR' => 'Ditolak'
            ]);
        return back()->with('sukses', 'Data SPR Berhasil Diverifikasi');
    }
}
