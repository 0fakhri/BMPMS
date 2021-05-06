<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dataakun extends Controller
{
    public function index()
    {
     
        return view ('/dataakun');
    }

    //buat paket
    public function create(Request $request)
    {
      $this->validate($request,[
          'nama_paket' => 'required|min:5|max:30|unique:paket_pekerjaan',
          'harga_paket'=>'required|numeric|min:30000',
          'deskripsi_paket' => '|min:15|'
      ]);
      $data_paket = \App\paket_pekerjaan::create($request->all());
       if ($request->hasFile('foto_paket')) {
          $request->file('foto_paket')->move('images', $request->file('foto_paket')->getClientOriginalName());
          $data_paket->foto_paket = $request->file('foto_paket')->getClientOriginalName();
      }
      $data_paket ->save();
      return redirect('/data_paket_pekerjaan')->with('sukses','data berhasil ditambahkan');
    }

    //lihat detail paket
    public function show($id)
    {
        $data_paket = \App\paket_pekerjaan::find($id);
          return view ('admin.v_detailsPaket', ['data_paket' => $data_paket]);
    }

    //edit paket  
    public function edit($id)
    {
      $data_paket = \App\paket_pekerjaan::find($id);
      return view ('admin.v_editpaketpk', ['data_paket' => $data_paket]);
    }

    //update paket
    public function update(Request $request, $id)
    {
       $this->validate($request,[
          'nama_paket' => 'required|min:5|max:30',
          'harga_paket'=>'required|numeric|min:30000|max:10000000',
          'deskripsi_paket' => '|min:15|'
      ]);
      $data_paket = \App\paket_pekerjaan::find($id);
      $data_paket->update($request->all());
     if ($request->hasFile('foto_paket')) {
         $request->file('foto_paket')->move('images', $request->file('foto_paket')->getClientOriginalName());
         $data_paket->foto_paket = $request->file('foto_paket')->getClientOriginalName();
         $data_paket->save($request->all());
     }
     return redirect('/data_paket_pekerjaan')->with('sukses', 'data berhasil diubah');
    }
}