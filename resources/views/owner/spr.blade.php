@extends('owner.layouts.master')
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
            <th hidden></th>
            <th>No. SPR</th>
            <th>Tipe</th>
            <th>Tanggal SPR</th>
            <th>Uang Muka</th>
            <th>Keterangan</th>
            <th>Status</th>
            <th>Nama Konsumen</th>
            <th hidden></th>
            <th hidden></th>
            <th>Aksi</th>
          </tr>
        </thead>

        <tbody>
          @foreach($spr as $s)
          <tr class="text-center">
            <td hidden>{{$s->SPR_ID}}</td>
            <td>{{$s->No_SPR}}</td>
            <td>{{$s->NamaTipe}}</td>
            <td>{{$s->TanggalSPR}}</td>
            <td>{{$s->UangMuka}}</td>
            <td>{{$s->Keterangan}}</td>
            <td>{{$s->StatusSPR}}</td>
            <td>{{$s->NamaLengkap}}</td>
            <td hidden>{{$s->TipeID}}</td>
            <td hidden>{{$s->KonsumenID}}</td>
            <td>
              @if($s->StatusSPR == "Disetujui")
              <a href="/spr/pdf/{{$s->SPR_ID}}" target="_blank" class="btn btn-sm btn-outline-warning"><i class="fas fa-print"></i> Cetak SPR</a><br>
              <a href="/owner/spr/pembayaran/{{$s->SPR_ID}}" class="mt-2 btn btn-sm btn-outline-primary"><i class="fas fa-eye"></i> Detail Pembayaran</a>
              @elseif($s->StatusSPR == "Ditolak")
              {{__('-')}}
              @else
              <form class="d-inline" action="/manajer/spr/setuju/{{$s->SPR_ID}}" method="post">
                @method('put')
                @csrf
                <button class="btn btn-sm btn-outline-success"><i class="fas fa-check"></i> Setuju</button>
              </form>
              <form class="d-inline" action="/manajer/spr/tolak/{{$s->SPR_ID}}" method="post">
                @method('put')
                @csrf
                <button class="btn btn-sm btn-outline-danger"><i class="fas fa-times"></i> Tolak</button>
              </form>
              <br><a href="" data-toggle="modal" data-target="#editspr" class="mt-2 btn btn-sm btn-outline-warning edit"><i class="fas fa-edit"></i> Edit</a>
              <form class="d-inline" action="/manajer/spr/hapus/{{$s->SPR_ID}}" method="post">
                @method('delete')
                @csrf
                <button class="mt-2 btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i> Hapus</button>
              </form>
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