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
  <li>&#47;&nbsp;<i class="fas fa"></i>&nbsp;Data Konsumen&nbsp;</li>
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
        <form action="{{url('/konsumen')}}" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="form-group ">
            <label>NamaLengkap</label>
            <input name="NamaLengkap" type="text" class="form-control" id="NamaLengkap">
            @if($errors->has('NamaLengkap'))
            <span class="help-block">{{($errors->first('NamaLengkap'))}}</span>
            @endif
          </div>
          <div class="form-group">
            <label>Tanggal lahir</label>
            <input name="TanggalLahir" type="date" class="form-control" id="TanggalLahir">
          </div>
          <div class="form-group">
            <label>Jenis Kelamin</label>
            <select class="form-control" id="JenisKelamin" name="JenisKelamin">
              <option disabled>Jenis Kelamin</option>
              <option value="Laki-laki">Laki-Laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <input name="Alamat" type="text" class="form-control" id="Alamat">
          </div>
          <div class="form-group">
            <label>No Telp</label>
            <input name="Telepon" type="text" class="form-control" id="Telepon">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input name="Email" type="email" class="form-control" id="Email">
          </div>
          <div class="form-group">
            <label>Scan KTP</label>
            <input name="FotoKTP" type="file" class="form-control" id="FotoKTP" value="">
            <i></i>
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
<!-- end Modal tmbah paket -->

<!-- Table -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="col-sm-12 col-md-6">
      <h6 class="m-0 font-weight-bold text-primary">Data Konsumen</h6>
    </div>
  </div>
  <div class="card-body" style="font-size: 15px;">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

        <thead style="background-color: #ddd;">
          <tr class="text-center">
            <th>Nama</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>No. Telepon</th>
            <th>Email</th>
            <th>Scan KTP</th>
            <th>Aksi</th>
          </tr>
        </thead>

        <tbody>
          @foreach($dataKonsumen as $dk)
          <tr class="text-center">
            <th>{{$dk->NamaLengkap}}</th>
            <th>{{$dk->TanggalLahir}}</th>
            <th>{{$dk->JenisKelamin}}</th>
            <th>{{$dk->Alamat}}</th>
            <th>{{$dk->Telepon}}</th>
            <th>{{$dk->Email}}</th>
            <th><img src="{{ asset('img/'. $dk->FotoKTP)}}" alt="ScanKTP" width="100"></th>
            <th>
              <a href="/konsumen/edit" class="btn btn-primary">Update</a><br>
              <a href="#" class="btn btn-danger">Delete</a>
            </th>
          </tr>
          @endforeach
        </tbody>

      </table>

    </div>
  </div>
</div>

@endsection