@extends('owner.layouts.master')
@section('content')

<ol class="breadcrumb">
  <li><i class="fa fa-home"></i><a href="/">&nbsp;Home&nbsp;</a></li>
  <li><i class="fa fa-home"></i><a href="/owner/konsumen">&nbsp;Data Konsumen&nbsp;</a></li>
  <li>&#47;&nbsp;<i class="fas fa-people-carry"></i>&nbsp;Detail Data Konsumen&nbsp;</li>
</ol>

<!-- Profil -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="col-sm-12 col-md-6">
      <h6 class="m-0 font-weight-bold text-primary">Detail Data Konsumen</h6>
    </div>
  </div>
  <div class="container">
    <img class="img-fluid text-left" src="KTP.jpeg" width="400"> 
    <div class="row">
      <div class="col-3">Nama Lengkap</div>
      <div class="col-1">:</div>
      <div class="col-8">Ifan Rendi</div>
    </div>
    <div class="row">
      <div class="col-3">Tanggal Lahir</div>
      <div class="col-1">:</div>
      <div class="col-8">Jember</div>
    </div>
    <div class="row">
      <div class="col-3">Jenis Kelamin</div>
      <div class="col-1">:</div>
      <div class="col-8">ifanrendi@gmail.com</div>
    </div>
    <div class="row">
      <div class="col-3">Alamat</div>
      <div class="col-1">:</div>
      <div class="col-8">090909090</div>
    </div>
    <div class="row">
      <div class="col-3">Email</div>
      <div class="col-1">:</div>
      <div class="col-8">1</div>
    </div>
    <div class="row">
      <div class="col-3">Telepon</div>
      <div class="col-1">:</div>
      <div class="col-8">Rp. 1.000.000</div>
    </div>
  </div>
  <div class="card-body" style="font-size: 15px;">
    <div class="table-responsive">
      <table class="table" id="dataTable" width="100%" cellspacing="0">
        <thead style="background-color: #ddd;">
          <tr class="text-center">
            <th>SPR ID</th>
            <th>No SPR</th>
            <th>Tanggal SPR</th>
            <th>Uang Muka</th>
            <th>Keterangan</th>
            <th>Status SPR</th>
          </tr>
        </thead>
        <tbody>
          <tr class="text-center">
            <td>1</td>
            <td>28012021</td>
            <td>12-02-2021</td>
            <td>Rp. 500.000</td>
            <td>Keterangan</td>
            <td>status</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection