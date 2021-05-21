@extends('manajer.layouts.master')
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
    <li>&#47;&nbsp;<i class="fa fa-users"></i><a href="/User">&nbsp;Data SPR&nbsp;</a></li>
    <li>&#47;&nbsp;<i class="fa fa-cogs"></i>&nbsp;Edit</li>
  </ol>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="col-sm-12 col-md-6">
      <h6 class="m-0 font-weight-bold text-primary">Edit Data SPR</h6>
      </div>
    </div>
    <div class="card-body" style="font-size: 15px;">
    <div class="table-responsive">
    <form action="" method="POST" enctype="multipart/form-data" >
              {{csrf_field()}}
        <div class="form-group ">
        <label >No. SPR</label>
        <input name="nama_akun" type="number" class="form-control" id="nama_akun">
        @if($errors->has('akun'))
          <span class="help-block">{{($errors->first('nama_akun'))}}</span>
        @endif
      </div>
      <div class="form-group">
        <label >Tanggal Pemesanan</label>
        <input name="kode_akun" type="date" class="form-control" id="kode_akun">
      </div>
      <div class="form-group">
        <label >DP</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">Rp</div>
          </div>
          <input type="number" class="form-control" id="inlineFormInputGroup">
        </div>
      </div>
      <div class="form-group">
        <label>Dokumen SPR</label>
        <input name="foto" type="file" class="form-control" id="foto"  value="" >
        <i></i>
      </div>
      <button type="button" class="btn btn-secondary"><a href="/spr" style="text-decoration: none; color: #fff">Batal</a></button>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    </form>
  </div>
  </div>

@endsection