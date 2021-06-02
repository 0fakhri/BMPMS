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

<ol class="breadcrumb">
  <li><i class="fa fa-home"></i><a href="/">&nbsp;Home&nbsp;</a></li>
  <li><i class="fa fa-home"></i><a href="/owner/konsumen">&nbsp;Data Kebutuhan Proyek&nbsp;</a></li>
  <li>&#47;&nbsp;<i class="fas fa-people-carry"></i>&nbsp;Detail Data Kebutuhan Proyek&nbsp;</li>
</ol>

<!-- modal verif -->
<div class="modal fade" id="verifmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Verifikasi Kebutuhan Proyek</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/owner/kproyek/{{$detail_kebutuhan->KP_ID}}/verifikasi" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          @method('PUT')
          <div class="form-group">
            <label for="Penanggungjawab">Verifikasi Status </label>
            <select class="form-control" id="StatusPersetujuan" name="StatusPersetujuan">
              <option value="Disetujui">Disetujui</option>
              <option value="Ditolak">Ditolak</option>
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#showmessage">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



<!-- Profil -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="col-sm-12 col-md-6">
      <h6 class="m-0 font-weight-bold text-primary">Detail Data Kebutuhan Proyek</h6>
    </div>
  </div>
  <div class="container">
    <div class="mt-2 row" style="margin-bottom:10px">
      <div class="col-sm-12 col-md-6">
        @if(auth()->user()->role == 'Owner')
        <!-- modal editKP -->
        <div class="modal fade" id="editKP" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Edit Kebutuhan Proyek</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="/owner/kproyek/{{$detail_kebutuhan->KP_ID}}/edit" method="POST" enctype="multipart/form-data">
                  {{csrf_field()}}
                  @method('PUT')
                  <div class="form-group">
                    <label>Tanggal Pengajuan</label>
                    <input name="TanggalPengajuan" type="date" class="form-control" id="TanggalPengajuan" value="{{$detail_kebutuhan->TanggalPengajuan}}">
                    @if($errors->has('TanggalPengajuan'))
                    <span class="help-block">{{($errors->first('TanggalPengajuan'))}}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="PenanggungJawab">Penanggung Jawab</label>
                    <input name="PenanggungJawab" type="text" class="form-control" id="PenanggungJawab" value="{{$detail_kebutuhan->PenanggungJawab}}" readonly>
                    @if($errors->has('PenanggungJawab'))
                    <span class="help-block">{{($errors->first('PenanggungJawab'))}}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Total Nominal</label>
                    <input name="TotalNominal" type="number" class="form-control" id="TotalNominal" value="{{$detail_kebutuhan->TotalNominal}}">
                    @if($errors->has('TotalNominal'))
                    <span class="help-block">{{($errors->first('TotalNominal'))}}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Dokumen KP</label>
                    <input name="Doc_KP" type="file" class="form-control" id="Doc_KP" value="{$detail_kebutuhan->Doc_KP}}">
                    @if($errors->has('Doc_KP'))
                    <span class="help-block">{{($errors->first('Doc_KP'))}}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="StatusPersetujuan">Status Persetujuan</label>
                    <input name="StatusPersetujuan" type="text" class="form-control" id="StatusPersetujuan" value="{{$detail_kebutuhan->StatusPersetujuan}}" readonly>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#showmessage">Update</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <button type="button" class="btn btn-warning btn-rounded btn-outline
    hidden-xs hidden-sm waves-effect waves-light" data-toggle="modal" data-target="#editKP">
          Edit Kebutuhan Proyek</button>
        @elseif(auth()->user()->role == 'Kontraktor')
        <div class="modal fade" id="editKP" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Material Proyek</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="/kontraktor/mproyek" method="POST" enctype="multipart/form-data">
                  {{csrf_field()}}
                  <div class="form-group">
                    <label>Tanggal Pengiriman</label>
                    <input name="TanggalPengiriman" type="date" class="form-control" id="TanggalPengiriman" value="">
                    @if($errors->has('TanggalPengiriman'))
                    <span class="help-block">{{($errors->first('TanggalPengiriman'))}}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Dokumen MP</label>
                    <input name="Doc_MP" type="file" class="form-control" id="Doc_MP" value="">
                    @if($errors->has('Doc_MP'))
                    <span class="help-block">{{($errors->first('Doc_MP'))}}</span>
                    @endif
                  </div>
                  <input type="hidden" name="KebutuhanProyek_KP_ID" id="KebutuhanProyek_KP_ID" value="{{$detail_kebutuhan->KP_ID}}">
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#showmessage">Simpan</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <button type="button" class="btn btn-warning btn-rounded btn-outline
    hidden-xs hidden-sm waves-effect waves-light" data-toggle="modal" data-target="#editKP">
          Tambah Material Proyek</button>
        @endif
      </div>
    </div>
    <div class="row">
      <div class="col-3">KP_ID</div>
      <div class="col-1">:</div>
      <div class="col-8">{{$detail_kebutuhan->KP_ID}}</div>
    </div>
    <div class="row">
      <div class="col-3">Tanggal Pengajuan</div>
      <div class="col-1">:</div>
      <div class="col-8">{{$detail_kebutuhan->TanggalPengajuan}}</div>
    </div>
    <div class="row">
      <div class="col-3">Penanggung Jawab</div>
      <div class="col-1">:</div>
      <div class="col-8">{{$detail_kebutuhan->PenanggungJawab}}</div>
    </div>
    <div class="row">
      <div class="col-3">Total Nominal</div>
      <div class="col-1">:</div>
      <div class="col-8">{{$detail_kebutuhan->TotalNominal}}</div>
    </div>
    <div class="row">
      <div class="col-3">Dokumen KP</div>
      <div class="col-1">:</div>
      <div class="col-8"><a href="/owner/proyek/{{$detail_kebutuhan->KP_ID}}/download" class="badge badge-primary fa fa-eye"> LIHAT</a></td>
      </div>
    </div>
    <div class="row">
      <div class="col-3">Status Persetujuan</div>
      <div class="col-1">:</div>
      <div class="col-8">
        {{$detail_kebutuhan->StatusPersetujuan}}
        @if($detail_kebutuhan->StatusPersetujuan == 'Belum Disetujui' AND auth()->user()->role == 'Owner')
        <a href="" data-toggle="modal" data-target="#verifmodal" class="badge badge-warning fa fa-edit"> Lakukan Verifikasi</a>
        @endif
      </div>
    </div>
  </div>

  <div class="card-body" style="font-size: 15px;">
    <div class="mb-3 card-header py-3">
      <div class="col-sm-12 col-md-6">
        <h6 class="mb-0 font-weight-bold text-primary">Data Material Proyek Untuk Kebutuhan Proyek Ini</h6>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table" id="dataTable" width="100%" cellspacing="0">
        <thead style="background-color: #ddd;">
          <tr class="text-center">
            <th>MP ID</th>
            <th>Tanggal Pengiriman</th>
            <th>Dokumen MP</th>
            <th>Status Verifikasi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($MaterialProyek as $MP)
          <tr class="text-center">
            <td>{{$MP->MP_ID}}</td>
            <td>{{$MP->TanggalPengiriman}}</td>
            <td><a href="/kontraktor/mproyek/{{$MP->MP_ID}}/download" class="badge badge-primary fa fa-eye"> LIHAT</a></td>
            <td>{{$MP->StatusVerifikasi}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection