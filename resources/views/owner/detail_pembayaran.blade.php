@extends('owner.layouts.master')
@section('content')

<ol class="breadcrumb">
  <li><i class="fa fa-home"></i><a href="/">&nbsp;Home&nbsp;</a></li>
  <li><i class="fa fa-home"></i><a href="/owner/pembayaran">&nbsp;Data Pembayaran&nbsp;</a></li>
  <li>&#47;&nbsp;<i class="fas fa-people-carry"></i>&nbsp;Detail Pembayaran&nbsp;</li>
</ol>

<!-- Profil -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="col-sm-12 col-md-6">
      <h6 class="m-0 font-weight-bold text-primary">Data Pembayaran</h6>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-3">Nama Lengkap</div>
      <div class="col-1">:</div>
      <div class="col-8">Ifan Rendi</div>
    </div>
    <div class="row">
      <div class="col-3">Alamat</div>
      <div class="col-1">:</div>
      <div class="col-8">Jember</div>
    </div>
    <div class="row">
      <div class="col-3">Email</div>
      <div class="col-1">:</div>
      <div class="col-8">ifanrendi@gmail.com</div>
    </div>
    <div class="row">
      <div class="col-3">Telepon</div>
      <div class="col-1">:</div>
      <div class="col-8">090909090</div>
    </div>
    <div class="row">
      <div class="col-3">No SPR</div>
      <div class="col-1">:</div>
      <div class="col-8">1</div>
    </div>
    <div class="row">
      <div class="col-3">Harga</div>
      <div class="col-1">:</div>
      <div class="col-8">Rp. 1.000.000</div>
    </div>
    <div class="row">
      <div class="col-3">Status Pembayaran</div>
      <div class="col-1">:</div>
      <div class="col-8">Belum Lunas</div>
    </div>
  </div>
  <div class="card-body" style="font-size: 15px;">
    <div class="table-responsive">
      <table class="table" id="dataTable" width="100%" cellspacing="0">
        <thead style="background-color: #ddd;">
          <tr class="text-center">
            <th>ID</th>
            <th>Tanggal Transaksi</th>
            <th>Bukti Transaksi</th>
            <th>Keterangan</th>
            <th>Nominal Transaksi</th>
          </tr>
        </thead>
        <tbody>
          <tr class="text-center">
            <td>1</td>
            <td>28-01-2021</td>
            <td><a href="#" class="badge badge-primary fa fa-eye"> LIHAT</a></td>
            <td class="text-left">Keterangan</td>
            <td class="text-right">Rp.700.000</td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td class="text-right"><strong>Total :</strong></td>
            <td class="text-right"><span>Rp. 700.000</td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td class="text-right"><strong>Sisa Pembayaran :</strong></td>
            <td class="text-right"><span>Rp. 300.000</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection