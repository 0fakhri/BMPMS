@extends('manajer.layouts.master')
@section('content')


<ol class="breadcrumb">
  <li><i class="fa fa-home"></i><a href="/">&nbsp;Home&nbsp;</a></li>
  <li>&#47;&nbsp;<i class="fas fa-people-carry"></i>&nbsp;Data Proyek&nbsp;</li>
</ol>



<!-- Table -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="col-sm-12 col-md-6">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Kebutuhan Proyek</h6>
    </div>
  </div>
  <div class="card-body" style="font-size: 15px;">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <div class="row">

        </div>
        <thead style="background-color: #ddd;">
          <tr class="text-center">
            <th>KP ID</th>
            <th>Tanggal Pengajuan</th>
            <th>Penanggung Jawab</th>
            <th>Total Nominal</th>
            <th>Status Persetujuan</th>
            <th>Dokumen KP</th>
          </tr>
        </thead>
        <tbody>
          @foreach($KebutuhanP as $KP)
          <tr class="text-center">
            <td>{{$KP->KP_ID}}</td>
            <td>{{$KP->TanggalPengajuan}}</td>
            <td>{{$KP->PenanggungJawab}}</td>
            <td>{{$KP->TotalNominal}}</td>
            <td>{{$KP->StatusPersetujuan}}</td>
            <td>
              <!-- <button type="button" class="btn btn-warning btn-rounded btn-outline
              hidden-xs hidden-sm waves-effect waves-light" data-toggle="modal" data-target="#editdata">
                <i class="fa fa-edit fa-fw" aria-hidden="true"></i>Edit</button> -->

              <a href="/owner/proyek/{{$KP->KP_ID}}/download" class="btn btn-sm btn-outline-warning fa fa-eye">Lihat</a>
              <!-- <button type="button" class="btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#editdata">
                <i class="fa fa-eye" aria-hidden="true"></i>Detail</button> -->
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection