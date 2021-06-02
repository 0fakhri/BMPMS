@extends('keuangan.layouts.master')
@section('content')


<ol class="breadcrumb">
  <li><i class="fa fa-home"></i><a href="/dashboard">&nbsp;Home&nbsp;</a></li>
  <li>&#47;&nbsp;<i class="fas fa"></i>&nbsp;Data SPR (Surat Pemesanan Rumah)&nbsp;</li>
</ol>

<!-- Table -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="col-sm-12 col-md-6">
      <h6 class="m-0 font-weight-bold text-primary">Data SPR (Surat Pemesanan Rumah)</h6>
    </div>
  </div>
  <div class="card-body" style="font-size: 15px;">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

        <thead style="background-color: #ddd;">
          <tr class="text-center">
            <th>No. SPR</th>
            <th>Tipe</th>
            <th>Tanggal SPR</th>
            <th>Uang Muka</th>
            <th>Keterangan</th>
            <th>Status</th>
            <th>Nama Konsumen</th>
            <th>Aksi</th>
          </tr>
        </thead>

        <tbody>
          @foreach($spr as $s)
          <tr class="text-center">
            <th>{{$s->No_SPR}}</th>
            <th>{{$s->NamaTipe}}</th>
            <th>{{$s->TanggalSPR}}</th>
            <th>{{$s->UangMuka}}</th>
            <th>{{$s->Keterangan}}</th>
            <th>{{$s->StatusSPR}}</th>
            <th>{{$s->NamaLengkap}}</th>
            <th>
              @if($s->StatusSPR == "Disetujui")
              <a href="/spr/pdf/{{$s->SPR_ID}}" target="_blank" class="btn btn-sm btn-outline-warning"><i class="fas fa-print"></i> Cetak SPR</a><br>
              <a href="/divkeuangan/spr/pembayaran/{{$s->SPR_ID}}" class="mt-2 btn btn-sm btn-outline-primary"><i class="fas fa-eyes"></i> Detail Pembayaran</a>
              @else
              {{__('-')}}
              @endif
            </th>
          </tr>
          @endforeach
        </tbody>

      </table>

    </div>
  </div>
</div>

@endsection