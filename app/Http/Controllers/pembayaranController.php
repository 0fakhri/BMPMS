<?php

namespace App\Http\Controllers;

use App\pembayaran;
use App\spr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $spr = DB::table('spr')
            ->join('konsumen', 'spr.Konsumen_KonsumenID', '=', 'konsumen.KonsumenID')
            ->join('tipe_perumahan', 'spr.TipePerumahan_TipeID', 'tipe_perumahan.TipeID')
            ->select('konsumen.*', 'tipe_perumahan.*', 'spr.*')
            ->where('spr.SPR_ID', $id)
            ->first();
        $idmax = DB::table('transaksi_pembayaran')
            ->select(DB::raw('MAX(TransaksiID) as id'))
            ->where('SPR_SPR_ID', $id)
            ->first();
        $StatusBayar = pembayaran::select('StatusPembayaran')->where('SPR_SPR_ID', $id)->where('TransaksiID', $idmax->id)->first();
        if ($StatusBayar != NULL) {
            $StatusBayar =  $StatusBayar->StatusPembayaran;
        } else {
            $StatusBayar = 'Belum Lunas';
        }
        $pembayaran = pembayaran::where('SPR_SPR_ID', $id)->get();
        if (auth()->user()->role == 'Divisi Keuangan') {
            return view('keuangan.pembayaran', compact('spr', 'pembayaran', 'StatusBayar'));
        } elseif (auth()->user()->role == 'Manajer') {
            return view('manajer.pembayaran', compact('spr', 'pembayaran', 'StatusBayar'));
        } elseif (auth()->user()->role == 'Owner') {
            return view('owner.pembayaran', compact('spr', 'pembayaran', 'StatusBayar'));
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
    public function store(Request $request, $id)
    {
        // ambil harga unitnya & uangmuka
        $harga = DB::table('spr')
            ->join('tipe_perumahan', 'spr.TipePerumahan_TipeID', 'tipe_perumahan.TipeID')
            ->select('tipe_perumahan.Harga', 'spr.*')
            ->Where('spr.SPR_ID', $id)
            ->first();

        $cekBayar = pembayaran::where('SPR_SPR_ID', $id)->count();

        $request->validate([
            'NominalTransaksi' => 'required',
            'BuktiTransaksi' => 'required',
            'Keterangan' => 'required'
        ]);
        $file_BT = $request->BuktiTransaksi;
        $nama_BT = date('Y-m-d-h-i-s') . $file_BT->getClientOriginalName();

        // cek apakah pembayaran pertama
        if ($cekBayar == 0) {
            $sisabayar = $harga->Harga - $harga->UangMuka - $request->NominalTransaksi;
            if ($sisabayar == 0) {
                $status = 'Lunas';
            } else {
                $status = 'Belum Lunas';
            }
        } else {
            $idmax = DB::table('transaksi_pembayaran')
                ->select(DB::raw('MAX(TransaksiID) as id'))
                ->first();
            $sisabayar = db::table('transaksi_pembayaran')->where('SPR_SPR_ID', $id)->where('TransaksiID', $idmax->id)->first();
            $sisabayar = $sisabayar->SisaPembayaran - $request->NominalTransaksi;
            if ($sisabayar == 0) {
                $status = 'Lunas';
            } else {
                $status = 'Belum Lunas';
            }
        }

        // cek lunas


        DB::table('transaksi_pembayaran')->insert([
            'TanggalTransaksi' => date('Y-m-d'),
            'BuktiTransaksi' => $nama_BT,
            'NominalTransaksi' => $request->NominalTransaksi,
            'SisaPembayaran' => $sisabayar,
            'Keterangan' => $request->Keterangan,
            'StatusPembayaran' => $status,
            'SPR_SPR_ID' => $id,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        $file_BT->move(public_path() . '/fileupload/BuktiPembayaran', $nama_BT);
        return back()->with('sukses', 'Data Pembayaran Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'NominalTransaksi_edit' => 'required',
            'Keterangan_edit' => 'required'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(pembayaran $pembayaran)
    {
        //
    }
}
