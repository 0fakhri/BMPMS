@extends('manajer.layouts.master')
@section('content')

<ol class="breadcrumb">
  <li><i class="fa fa-home"></i><a href="/dashboard">&nbsp;Home&nbsp;</a></li>
  <li>&#47;&nbsp;<i class="fas fa"></i>&nbsp;Data Legalitas&nbsp;</li>
</ol>


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
            <th>Aksi</th>
          </tr>
        </thead>

        <tbody>
          @foreach($legalitas as $l)
          <tr class="text-center">
            <td>
              @if($l->No_Legalitas != NULL)
              {{$l->No_Legalitas}}
              @else
              {{__('-')}}
              @endif
            </td>
            <td>
              @if($l->TanggalTerbit != NULL)
              {{$l->TanggalTerbit}}
              @else
              {{__('-')}}
              @endif
            </td>
            <td>{{$l->No_Unit}}</td>
            <td>{{$l->StatusLegalitas}}</td>
            <td>
              @if($l->StatusLegalitas == 'Telah Diterbitkan')
              <a href="/legalitas/pdf/{{$l->LegalitasID}}" target="_blank" class="btn btn-sm btn-outline-primary"><i class="fas fa-print"></i> Cetak Legalitas</a>
              @else
              {{__('-')}}
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>

      </table>

    </div>
  </div>
</div>

@endsection