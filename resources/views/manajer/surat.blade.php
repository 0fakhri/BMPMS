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
  <li>&#47;&nbsp;<i class="fas fa"></i>&nbsp;Hutang Belum Dibayar&nbsp;</li>
</ol>

<!-- Modal tmbah paket -->
<div class="modal fade" id="createdata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel">Form Tambah AKUN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
     </div>
<div class="modal-body">
      <form action="/data_akun/create" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="text" name="role" value="3" hidden>
        <div class="form-group ">
          <label >Nama Akun</label>
          <input name="nama_akun" type="text" class="form-control" id="nama_akun" value="{{old('nama_akun')}}">
          @if($errors->has('akun'))
          <span class="help-block">{{($errors->first('nama_akun'))}}</span>
          @endif
        </div>
        <div class="form-group">
          <label >kode akun</label>
          <input name="kode_akun" type="text" class="form-control" id="kode_akun" value="{{old('kode_akun')}}">
          @if($errors->has('kode_akun'))
          <span class="help-block">{{($errors->first('kode_akun'))}}</span>
          @endif
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#showmessage">BUAT AKUN</button>
        </div>
      </form>
    </div>
         </div>
      </div>
    </div>

<!-- end Modal tmbah paket -->
<div class="row" style="margin-bottom:10px">
  <div class="col-sm-12 col-md-6">
    <button type="button" class="btn btn-danger btn-rounded btn-outline
    hidden-xs hidden-sm waves-effect waves-light" data-toggle="modal" data-target="#createdata">
    <i class="fa fa-plus-square fa-fw" aria-hidden="true"></i>Tambah AKUN</button>
  </div>
</div>
<!-- Table -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="col-sm-12 col-md-6">
      <h6 class="m-0 font-weight-bold text-primary">Hutang Belum Dibayar</h6>
    </div>
  </div>
  <div class="card-body" style="font-size: 15px;">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <div class="row">
          <form  method="get" action="{{url('/data_paket_pekerjaan')}}" role="search">
            <div class="col-sm-12 col-md-4">
              <div id="dataTable_filter" class="dataTables_filter">
                <label>Search:<input name="cari" type="text" class="form-control form-control-sm" placeholder="" aria-describedby="basic-addon2"></label>
                <button class="btn btn-outline-info" type="submit" style="height: 2rem" >
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
        <thead style="background-color: #ddd;">
          <tr class="text-center">
            <th>No. SPR</th>
            <th>Nama Surat</th>
            <th>Kapling/Unit</th>
            <th>Harga Total Setelah Penambahan</th>
            <th>Cara Pembayaran</th>
            <th>Tanggal Transaksi</th>
            <th>Status</th>
            <th>Status Manajer</th>
            <th>Dibuat Oleh</th>
            <th>Aksi</th>
          </tr>
        </thead>
       
        <tbody>
          <tr class="text-center">
           
          </tr>
        </tbody>
        
      </table>
     
    </div>
  </div>
</div>

@endsection