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
        if (auth()->user()->role == 'Owner') {
            return view('owner.konsumen', compact('dataKonsumen'));
        } elseif (auth()->user()->role == 'Manajer') {
            return view('manajer.konsumen', compact('dataKonsumen'));
        } elseif (auth()->user()->role == 'Divisi Keuangan') {
            return view('keuangan.konsumen', compact('dataKonsumen'));
        } elseif (auth()->user()->role == 'Divisi Marketing') {
            return view('marketing.konsumen', compact('dataKonsumen'));
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
            'NamaLengkap' => 'required',
            'TanggalLahir' => 'required',
            'JenisKelamin' => 'required',
            'Alamat' => 'required',
            'Email' => 'required|unique:konsumen,email',
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
        return back()->with('sukses', 'Data Konsumen Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\konsumen  $konsumen
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail_konsumen = konsumen::findorfail($id);
        if (auth()->user()->role == 'Owner') {
            return view('owner.detail_konsumen', compact('detail_konsumen'));
        } elseif (auth()->user()->role == 'Manajer') {
            return view('manajer.detail_konsumen', compact('detail_konsumen'));
        } elseif (auth()->user()->role == 'Divisi Keuangan') {
            return view('keuangan.detail_konsumen', compact('detail_konsumen'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\konsumen  $konsumen
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_konsumen = konsumen::findorfail($id);
        if (auth()->user()->role == 'Owner') {
            return view('manajer.editKonsumen', compact('edit_konsumen'));
        } elseif (auth()->user()->role == 'Divisi Marketing') {
            return view('marketing.editKonsumen', compact('edit_konsumen'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\konsumen  $konsumen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'NamaLengkap' => 'required',
            'TanggalLahir' => 'required',
            'JenisKelamin' => 'required',
            'Alamat' => 'required',
            'Email' => 'required',
            'Telepon' => 'required',
            'FotoKTP' => 'required'
        ]);

        $FotoKTP = $request->FotoKTP;
        $nama_FotoKTP = date('Y-m-d-h-i-s') . $FotoKTP->getClientOriginalName();
        $cari_fotolama = konsumen::findorfail($id);

        konsumen::where('KonsumenID', $id)
            ->update([
                'NamaLengkap' => $request->NamaLengkap,
                'TanggalLahir' => $request->TanggalLahir,
                'JenisKelamin' => $request->JenisKelamin,
                'Alamat' => $request->Alamat,
                'Email' => $request->Email,
                'Telepon' => $request->Telepon,
                'FotoKTP' => $nama_FotoKTP
            ]);

        $KTP = public_path('/img/') . $cari_fotolama->FotoKTP;
        @unlink($KTP);
        $FotoKTP->move(public_path() . '/img', $nama_FotoKTP);
        return back()->with('sukses', 'Data Konsumen Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\konsumen  $konsumen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = konsumen::findorfail($id);
        $KTP = public_path('/img/') . $hapus->FotoKTP;
        @unlink($KTP);
        $hapus->delete();
        return back()->with('sukses', 'Data Konsumen Berhasil Dihapus');
    }
}
