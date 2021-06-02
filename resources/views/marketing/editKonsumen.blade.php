@extends('marketing.layouts.master')
@section('content')

@if(session('sukses'))
<div class="alert alert-success" role="alert">
  {{session('sukses')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<ol class="breadcrumb">
  <li><i class="fa fa-home"></i><a href="/dashboard">&nbsp;Home&nbsp;</a></li>
  <li>&#47;&nbsp;<i class="fa fa-users"></i><a href="/user">&nbsp;Data Konsumen&nbsp;</a></li>
  <li>&#47;&nbsp;<i class="fa fa-cogs"></i>&nbsp;Edit</li>
</ol>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="col-sm-12 col-md-6">
      <h6 class="m-0 font-weight-bold text-primary">Edit Data Konsumen</h6>
    </div>
  </div>
  <div class="card-body" style="font-size: 15px;">
    <div class="table-responsive">
      <form action="/divmarketing/konsumen/{{$edit_konsumen->KonsumenID}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        @method('PUT')
        <div class="form-group ">
          <label>Nama</label>
          <input name="NamaLengkap" type="text" value="{{$edit_konsumen->NamaLengkap}}" class="form-control" id="NamaLengkap">
          @if($errors->has('nama'))
          <span class="help-block">{{($errors->first('nama'))}}</span>
          @endif
        </div>
        <div class="form-group">
          <label>Tanggal lahir</label>
          <input name="TanggalLahir" type="date" value="{{$edit_konsumen->TanggalLahir}}" class="form-control" id="TanggalLahir">
        </div>
        <div class="form-group">
          <label>Alamat</label>
          <input name="Alamat" type="text" value="{{$edit_konsumen->Alamat}}" class="form-control" id="Alamat">
        </div>
        <div class="form-group">
          <label>Jenis Kelamin</label>
          <input name="JenisKelamin" type="text" value="{{$edit_konsumen->JenisKelamin}}" class="form-control" id="JenisKelamin">
        </div>
        <div class="form-group">
          <label>No Telp</label>
          <input name="Telepon" value="{{$edit_konsumen->Telepon}}" type="number" class="form-control" id="Telepon">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input name="Email" value="{{$edit_konsumen->Email}}" type="email" class="form-control" id="Email">
        </div>
        <div class="form-group">
          <label>Scan KTP</label>
          <input name="FotoKTP" type="file" value="{{$edit_konsumen->FotoKTP}}" class="form-control" id="FotoKTP">
          <i></i>
        </div>
        <button type="button" class="btn btn-secondary"><a href="/konsumen" style="text-decoration: none; color: #fff">Batal</a></button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    </form>
  </div>
</div>

@endsection