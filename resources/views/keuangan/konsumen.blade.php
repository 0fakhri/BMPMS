@extends('keuangan.layouts.master')
@section('content')

<ol class="breadcrumb">
  <li><i class="fa fa-home"></i><a href="/dashboard">&nbsp;Home&nbsp;</a></li>
  <li>&#47;&nbsp;<i class="fas fa"></i>&nbsp;Data Konsumen&nbsp;</li>
</ol>

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
            <th>Alamat</th>
            <th>kota</th>
            <th>JR</th>
            <th>No. Telepon</th>
            <th>Email</th>
            <th>Scan KTP</th>
          </tr>
        </thead>
       
        <tbody>
          <tr class="text-center">
            <th>gagag</th>
            <th>gagag</th>
            <th>gagag</th>
            <th>gagag</th>
            <th>gagag</th>
            <th>gagag</th>
            <th>gagag</th>
            <th>
              <img src="" alt="">
            </th>
          </tr>
        </tbody>
        
      </table>
     
    </div>
  </div>
</div>

@endsection