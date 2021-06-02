@extends('marketing.layouts.master')
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
  <li>&#47;&nbsp;<i class="fas fa"></i>&nbsp;Data SPR (Surat Pemesanan Rumah)&nbsp;</li>
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
        <form action="/divmarketing/spr" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="form-group ">
            <label>No. SPR</label>
            <input name="No_SPR" type="text" class="form-control" id="No_SPR">
            @if($errors->has('No_SPR'))
            <span class="help-block">{{($errors->first('No_SPR'))}}</span>
            @endif
          </div>
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="StatusPersetujuan">Tipe Perumahan</label>
                <select class="form-control" id="TipePerumahan_TipeID" name="TipePerumahan_TipeID">
                  <option disabled>Tipe Perumahan</option>
                  @foreach($tipeperumahan as $tp)
                  <option value="{{$tp->TipeID}}">{{$tp->NamaTipe}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="StatusPersetujuan">No Unit</label>
                <input name="No_Unit" type="text" class="form-control" id="No_Unit">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Tanggal Pemesanan</label>
            <input name="TanggalSPR" type="date" class="form-control" id="TanggalSPR">
          </div>
          <div class="form-group">
            <label>Uang Muka</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">Rp</div>
              </div>
              <input type="number" class="form-control" name="UangMuka" id="UangMuka">
            </div>
          </div>
          <input type="hidden" value="Belum Disetujui" id="StatusSPR" name="StatusSPR">
          <div class="form-group">
            <label for="StatusPersetujuan">Konsumen</label>
            <select class="form-control" id="Konsumen_KonsumenID" name="Konsumen_KonsumenID">
              <option disabled>Konsumen</option>
              @foreach($konsumen as $k)
              <option value="{{$k->KonsumenID}}">{{$k->NamaLengkap}}</option>
              @endforeach
            </select>
          </div>
          <div class=" form-group">
            <label>Keterangan</label><br>
            <textarea name="Keterangan" id="Keterangan" cols="55" rows="5"></textarea>
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
              @if($s->StatusSPR != "Belum Disetujui")
              <a href="/spr/pdf/{{$s->SPR_ID}}" target="_blank" class="btn btn-primary">Cetak SPR</a>
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