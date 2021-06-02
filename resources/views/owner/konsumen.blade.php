@extends('owner.layouts.master')
@section('content')

<ol class="breadcrumb">
  <li><i class="fa fa-home"></i><a href="/">&nbsp;Home&nbsp;</a></li>
  <li>&#47;&nbsp;<i class="fas fa-people-carry"></i>&nbsp;Data Konsumen&nbsp;</li>
</ol>

<!-- Table -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="col-sm-12 col-md-6">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Konsumen</h6>
    </div>
  </div>
  <div class="card-body" style="font-size: 15px;">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <div class="row">

        </div>
        <thead style="background-color: #ddd;">
          <tr class="text-center">
            <th>ID</th>
            <th>Nama Lengkap</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Scan KTP</th>
            <th>Detail</th>
          </tr>
        </thead>
        <tbody>
          @foreach($dataKonsumen as $dk)
          <tr class="text-center">
            <td>{{$dk->KonsumenID}}</td>
            <td>{{$dk->NamaLengkap}}</td>
            <td>{{$dk->Alamat}}</td>
            <td>{{$dk->Email}}</td>
            <td>{{$dk->Telepon}}</td>
            <td><img src="{{ asset('img/'. $dk->FotoKTP)}}" alt="ScanKTP" width="100"></td>
            <td>
              <a href="/owner/konsumen/{{$dk->KonsumenID}}/detail_konsumen" class="badge badge-primary fa fa-eye"> LIHAT</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection