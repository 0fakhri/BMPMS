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
           <span class="help-block">Data tidak boleh kosong / Data yang diisi tidak valid, isi data dengan benar</span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>
  @endif

<ol class="breadcrumb">
  <li><i class="fa fa-home"></i><a href="/">&nbsp;Home&nbsp;</a></li>
  <li>&#47;&nbsp;<i class="fas fa-people-carry"></i>&nbsp;Data Proyek&nbsp;</li>
</ol>

<!-- Modal tmbah Proyek -->
<div class="modal fade" id="createdata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel">Form Tambah Proyek</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
     </div>
     <div class="modal-body">
      <form action="" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group ">
          <label >KP ID</label>
          <input name="KP_ID" type="number" class="form-control" id="KP_ID" value="{{old('KP_ID')}}">
          @if($errors->has('KP_ID'))
          <span class="help-block">{{($errors->first('KP_ID'))}}</span>
          @endif
        </div>
        <div class="form-group">
          <label >Tanggal Pengajuan</label>
          <input name="TanggalPengajuan" type="date" class="form-control" id="TanggalPengajuan" value="{{old('TanggalPengajuan')}}">
          @if($errors->has('TanggalPengajuan'))
          <span class="help-block">{{($errors->first('TanggalPengajuan'))}}</span>
          @endif
        </div>
        <div class="form-group">
          <label >Total Nominal</label>
          <input name="TotalNominal" type="number" class="form-control" id="TotalNominal" value="{{old('TotalNominal')}}">
          @if($errors->has('TotalNominal'))
          <span class="help-block">{{($errors->first('TotalNominal'))}}</span>
          @endif
        </div>
        <div class="form-group">
          <label >Dokumen KP</label>
          <input name="Doc_KP" type="file" class="form-control" id="Doc_KP" value="{{old('Doc_KP')}}">
          @if($errors->has('Doc_KP'))
          <span class="help-block">{{($errors->first('Doc_KP'))}}</span>
          @endif
        </div>
        <div class="form-group">
          <label for="Penanggungjawab">Penanggungjawab</label>
          <select class="form-control" id="Penanggungjawab">
            <option>Rendi</option>
            <option>Rendi a</option>
            <option>Rendi b</option>
            <option>Rendi c</option>
          </select>
        </div>
        <div class="form-group">
          <label for="StatusPersetujuan">Status Persetujuan</label>
          <select class="form-control" id="StatusPersetujuan">
            <option>Belum Disetujui</option>
            <option>Disetujui</option>
            <option>Ditolak</option>
          </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#showmessage">Buat Proyek</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>

<!-- end Modal tmbah Proyek -->
<div class="row" style="margin-bottom:10px">
  <div class="col-sm-12 col-md-6">
    <button type="button" class="btn btn-primary btn-rounded btn-outline
    hidden-xs hidden-sm waves-effect waves-light" data-toggle="modal" data-target="#createdata">
    <i class="fa fa-plus-square fa-fw" aria-hidden="true"></i>Tambah Proyek</button>
  </div>
</div>

<!-- Modal edit Proyek -->
<div class="modal fade" id="editdata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel">Form Edit Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
     </div>
     <div class="modal-body">
      <form action="" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group ">
          <label >KP ID</label>
          <input name="KP_ID" type="number" class="form-control" id="KP_ID" value="{{old('KP_ID')}}">
          @if($errors->has('KP_ID'))
          <span class="help-block">{{($errors->first('KP_ID'))}}</span>
          @endif
        </div>
        <div class="form-group">
          <label >Tanggal Pengajuan</label>
          <input name="TanggalPengajuan" type="date" class="form-control" id="TanggalPengajuan" value="{{old('TanggalPengajuan')}}">
          @if($errors->has('TanggalPengajuan'))
          <span class="help-block">{{($errors->first('TanggalPengajuan'))}}</span>
          @endif
        </div>
        <div class="form-group">
          <label >Total Nominal</label>
          <input name="TotalNominal" type="number" class="form-control" id="TotalNominal" value="{{old('TotalNominal')}}">
          @if($errors->has('TotalNominal'))
          <span class="help-block">{{($errors->first('TotalNominal'))}}</span>
          @endif
        </div>
        <div class="form-group">
          <label >Dokumen KP</label>
          <input name="Doc_KP" type="file" class="form-control" id="Doc_KP" value="{{old('Doc_KP')}}">
          @if($errors->has('Doc_KP'))
          <span class="help-block">{{($errors->first('Doc_KP'))}}</span>
          @endif
        </div>
        <div class="form-group">
          <label for="Penanggungjawab">Penanggungjawab</label>
          <select class="form-control" id="Penanggungjawab">
            <option>Rendi</option>
            <option>Rendi a</option>
            <option>Rendi b</option>
            <option>Rendi c</option>
          </select>
        </div>
        <div class="form-group">
          <label for="StatusPersetujuan">Status Persetujuan</label>
          <select class="form-control" id="StatusPersetujuan">
            <option>Belum Disetujui</option>
            <option>Disetujui</option>
            <option>Ditolak</option>
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

<!-- Table -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="col-sm-12 col-md-6">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Proyek</h6>
    </div>
  </div>
  <div class="card-body" style="font-size: 15px;">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <div class="row">
          <form  method="get" action="{{url('')}}" role="search">
            <div class="col-sm-12 col-md-4">
              <div id="dataTable_filter" class="dataTables_filter">
                <label>Search:<input name="cari" type="text" class="form-control form-control-sm" placeholder="" aria-describedby="basic-addon2"></label>
                <button class="btn btn-outline-info" type="submit" style="height: 2rem" >
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
        <thead style="background-color: #ddd;">
          <tr class="text-center">
            <th>KP ID</th>
            <th>Tanggal Pengajuan</th>
            <th>Penanggungjawab</th>
            <th>Total Nominal</th>
            <th>Dokumen KP</th>
            <th>Status Persetujuan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr class="text-center">
            <td>1</td>
            <td>28-19-2021</td>
            <td>-</td>
            <td>5.000.000</td>
            <td class="text-center"><a href="#" class="badge badge-primary fa fa-eye"> LIHAT</a></td>
            <td>Belum Disetujui</td>
            <td>
              <button type="button" class="btn btn-warning btn-rounded btn-outline
              hidden-xs hidden-sm waves-effect waves-light" data-toggle="modal" data-target="#editdata">
              <i class="fa fa-edit fa-fw" aria-hidden="true"></i>Edit</button>
              <button type="button" class="btn btn-danger btn-rounded btn-outline
              hidden-xs hidden-sm waves-effect waves-light">
              <i class="fa fa-trash fa-fw" aria-hidden="true"></i>Hapus</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection