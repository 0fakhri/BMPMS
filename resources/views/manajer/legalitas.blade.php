@extends('manajer.layouts.master')
@section('content')
@if(session('sukses'))
<!-- Modal -->
<div class="alert alert-success" role="alert">
  {{session('sukses')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@if(session('gagal'))
<!-- Modal -->
<div class="alert alert-warning" role="alert">
  {{session('gagal')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@if($errors->has([]))
<!-- Modal -->
    <div class="alert alert-danger" role="alert">
           <span class="help-block">Data tidak boleh kosong / Data yang diisi tidak valid, isi data dengan benar</span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>
  @endif
<ol class="breadcrumb">
  <li><i class="fa fa-home"></i><a href="/dashboard">&nbsp;Home&nbsp;</a></li>
  <li>&#47;&nbsp;<i class="fas fa"></i>&nbsp;Data Legalitas&nbsp;</li>
</ol>

<!-- end Modal tmbah paket -->
<div class="row" style="margin-bottom:10px">
  <div class="col-sm-12 col-md-6">
    <button type="button" class="btn btn-danger btn-rounded btn-outline
    hidden-xs hidden-sm waves-effect waves-light" data-toggle="modal" data-target="#createdata">
    <i class="fa fa-plus-square fa-fw" aria-hidden="true"></i>Tambah Data</button>
  </div>
</div>

<!-- Modal tmbah paket -->
<div class="modal fade" id="createdata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="form-group">
            <label >No Legalitas</label>
            <input name="kode_akun" type="number" class="form-control" id="kode_akun">
          </div>
          <div class="form-group ">
            <label >Tanggal Terbit</label>
            <input name="nama_akun" type="date" class="form-control" id="nama_akun">
            @if($errors->has('akun'))
              <span class="help-block">{{($errors->first('nama_akun'))}}</span>
            @endif
          </div>
          <div class="form-group">
            <label >No Unit</label>
            <input name="kode_akun" type="number" class="form-control" id="kode_akun">
          </div>
          <div class="form-group">
            <label >Status Legalitas</label>
            <input name="kode_akun" type="text" class="form-control" id="kode_akun">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Status Legalitas</label>
            <select class="form-control" id="exampleFormControlSelect1">
              <option disabled selected>Status Legalitas</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#showmessage">Tambah data</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Table -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="col-sm-12 col-md-6">
      <h6 class="m-0 font-weight-bold text-primary">Data Legalitas</h6>
    </div>
  </div>
  <div class="card-body" style="font-size: 15px;">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        
        <thead style="background-color: #ddd;">
          <tr class="text-center">
            <th>No Legalitas</th>
            <th>Tanggal Terbit</th>
            <th>No Unit</th>
            <th>Status Legalitas</th>
          </tr>
        </thead>
       
        <tbody>
          <tr class="text-center">
            <th>gagag</th>
            <th>gagag</th>
            <th>gagag</th>
            <th>gagag</th>
          </tr>
        </tbody>
        
      </table>
     
    </div>
  </div>
</div>

@endsection