<?php

namespace App\Http\Controllers;

use App\legalitas;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\DB;

class legalitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $legalitas = DB::table('legalitas')
            ->join('spr', 'spr.SPR_ID', '=', 'legalitas.SPR_SPR_ID')
            ->select('legalitas.*', 'spr.No_SPR')
            ->get();

        if (auth()->user()->role == 'Manajer') {
            return view('manajer.legalitas', compact('legalitas'));
        } elseif (auth()->user()->role == 'Owner') {
            return view('owner.legalitas', compact('legalitas'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'No_Legalitas_edit' => 'required',
            'StatusLegalitas_edit' => 'required',
            'TanggalTerbit_edit' => 'required'
        ]);
        legalitas::where('LegalitasID', $id)
            ->update([
                'No_Legalitas' => $request->No_Legalitas_edit,
                'TanggalTerbit' => $request->TanggalTerbit_edit,
                'StatusLegalitas' => 'Telah Diterbitkan'
            ]);

        return back()->with('sukses', 'Data Legalitas Berhasil Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function download($id)
    {
        $data = DB::table('spr')
            ->join('legalitas', 'spr.SPR_ID', '=', 'legalitas.SPR_SPR_ID')
            ->join('tipe_perumahan', 'spr.TipePerumahan_TipeID', 'tipe_perumahan.TipeID')
            ->select('legalitas.*', 'tipe_perumahan.*', 'spr.*')
            ->where('spr.SPR_ID', $id)
            ->first();
        $html = view('owner.legalitas-pdf', compact('data'));

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('F4', 'potrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
    }
}
