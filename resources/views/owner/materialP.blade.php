@extends('owner.layouts.master')
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
  <span class="help-block">{{$$errors}}Data tidak boleh kosong / Data yang diisi tidak valid, isi data dengan benar</span>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

<ol class="breadcrumb">
  <li><i class="fa fa-home"></i><a href="/">&nbsp;Home&nbsp;</a></li>
  <li>&#47;&nbsp;<i class="fas fa-people-carry"></i>&nbsp;Data Proyek&nbsp;</li>
</ol>

<!-- Table -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="col-sm-12 col-md-6">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Material Proyek</h6>
    </div>
  </div>
  <div class="card-body" style="font-size: 15px;">
    <div class="table-responsive">
      <table class="table" id="dataTable" width="100%" cellspacing="0">
        <thead style="background-color: #ddd;">
          <tr class="text-center">
            <th>MP ID</th>
            <th>Tanggal Pengiriman</th>
            <th>Dokumen MP</th>
            <th>Status Verifikasi</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($MaterialProyek as $MP)
          <tr class="text-center">
            <td>{{$MP->MP_ID}}</td>
            <td>{{$MP->TanggalPengiriman}}</td>
            <td><a href="/kontraktor/mproyek/{{$MP->MP_ID}}/download" class="badge badge-primary fa fa-eye"> LIHAT</a></td>
            <td>{{$MP->StatusVerifikasi}}</td>
            <th>
              @if($MP->StatusVerifikasi == 'Belum Diverifikasi')
              <form class="d-inline" action="/supplier/mproyek/setujui/{{$MP->MP_ID}}" method="post">
                @method('put')
                @csrf
                <button class="btn btn-sm btn-outline-success"><i class="fas fa-check"></i> Setuju</button>
              </form>
              <form class="d-inline" action="/supplier/mproyek/tolak/{{$MP->MP_ID}}" method="post">
                @method('put')
                @csrf
                <button class="btn btn-sm btn-outline-danger"><i class="fas fa-times"></i> Tolak</button>
              </form>
              @else
              <p class="text-primary">{{__('Verifikasi Telah dilakukan')}}</p>
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