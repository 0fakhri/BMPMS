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
  <li>&#47;&nbsp;<i class="fas fa-people-carry"></i>&nbsp;Data Legalitas&nbsp;</li>
</ol>

<!-- Modal tmbah legalitas -->
<div class="modal fade" id="createdata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel">Form Tambah Legalitas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
     </div>
     <div class="modal-body">
      <form action="" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group ">
          <label>No Legalitas</label>
          <input name="No_Legalitas" type="number" class="form-control" id="No_Legalitas" value="{{old('No_Legalitas')}}">
          @if($errors->has('No_Legalitas'))
          <span class="help-block">{{($errors->first('No_Legalitas'))}}</span>
          @endif
        </div>
        <div class="form-group">
          <label >Tanggal Terbit</label>
          <input name="TanggalTerbit" type="date" class="form-control" id="TanggalTerbit" value="{{old('TanggalTerbit')}}">
          @if($errors->has('TanggalTerbit'))
          <span class="help-block">{{($errors->first('TanggalTerbit'))}}</span>
          @endif
        </div>
        <div class="form-group ">
          <label>No Unit</label>
          <input name="No_Unit" type="number" class="form-control" id="No_Unit" value="{{old('No_Unit')}}">
          @if($errors->has('No_Unit'))
          <span class="help-block">{{($errors->first('No_Unit'))}}</span>
          @endif
        </div>
        <div class="form-group ">
          <label>Tipe</label>
          <input name="TipeID" type="number" class="form-control" id="TipeID" value="{{old('TipeID')}}">
          @if($errors->has('TipeID'))
          <span class="help-block">{{($errors->first('TipeID'))}}</span>
          @endif
        </div>
        <div class="form-group ">
          <label>Luas Tanah</label>
          <input name="LuasTanah" type="number" class="form-control" id="LuasTanah" value="{{old('LuasTanah')}}">
          @if($errors->has('LuasTanah'))
          <span class="help-block">{{($errors->first('LuasTanah'))}}</span>
          @endif
        </div>
        <div class="form-group ">
          <label>Luas Bangunan</label>
          <input name="LuasBangunan" type="number" class="form-control" id="LuasBangunan" value="{{old('LuasBangunan')}}">
          @if($errors->has('LuasBangunan'))
          <span class="help-block">{{($errors->first('LuasBangunan'))}}</span>
          @endif
        </div>
        <div class="form-group ">
          <label>Harga</label>
          <input name="Harga" type="number" class="form-control" id="Harga" value="{{old('Harga')}}">
          @if($errors->has('Harga'))
          <span class="help-block">{{($errors->first('Harga'))}}</span>
          @endif
        </div>
        <div class="form-group">
          <label for="StatusLegalitas">Status Legalitas</label>
          <select class="form-control" id="StatusLegalitas">
            <option>Belum Selesai</option>
            <option>Sudah Selesai</option>
          </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#showmessage">Buat Legalitas</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>

<!-- end Modal tmbah Legalitas -->
<div class="row" style="margin-bottom:10px">
  <div class="col-sm-12 col-md-6">
    <button type="button" class="btn btn-primary btn-rounded btn-outline
    hidden-xs hidden-sm waves-effect waves-light" data-toggle="modal" data-target="#createdata">
    <i class="fa fa-plus-square fa-fw" aria-hidden="true"></i>Tambah Legalitas</button>
  </div>
</div>

<!-- Modal edit Legalitas -->
<div class="modal fade" id="editdata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel">Form Edit Legalitas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
     </div>
     <div class="modal-body">
      <form action="" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group ">
          <label>No Legalitas</label>
          <input name="No_Legalitas" type="number" class="form-control" id="No_Legalitas" value="{{old('No_Legalitas')}}">
          @if($errors->has('No_Legalitas'))
          <span class="help-block">{{($errors->first('No_Legalitas'))}}</span>
          @endif
        </div>
        <div class="form-group">
          <label >Tanggal Terbit</label>
          <input name="TanggalTerbit" type="date" class="form-control" id="TanggalTerbit" value="{{old('TanggalTerbit')}}">
          @if($errors->has('TanggalTerbit'))
          <span class="help-block">{{($errors->first('TanggalTerbit'))}}</span>
          @endif
        </div>
        <div class="form-group ">
          <label>No Unit</label>
          <input name="No_Unit" type="number" class="form-control" id="No_Unit" value="{{old('No_Unit')}}">
          @if($errors->has('No_Unit'))
          <span class="help-block">{{($errors->first('No_Unit'))}}</span>
          @endif
        </div>
        <div class="form-group ">
          <label>Tipe</label>
          <input name="TipeID" type="number" class="form-control" id="TipeID" value="{{old('TipeID')}}">
          @if($errors->has('TipeID'))
          <span class="help-block">{{($errors->first('TipeID'))}}</span>
          @endif
        </div>
        <div class="form-group ">
          <label>Luas Tanah</label>
          <input name="LuasTanah" type="number" class="form-control" id="LuasTanah" value="{{old('LuasTanah')}}">
          @if($errors->has('LuasTanah'))
          <span class="help-block">{{($errors->first('LuasTanah'))}}</span>
          @endif
        </div>
        <div class="form-group ">
          <label>Luas Bangunan</label>
          <input name="LuasBangunan" type="number" class="form-control" id="LuasBangunan" value="{{old('LuasBangunan')}}">
          @if($errors->has('LuasBangunan'))
          <span class="help-block">{{($errors->first('LuasBangunan'))}}</span>
          @endif
        </div>
        <div class="form-group ">
          <label>Harga</label>
          <input name="Harga" type="number" class="form-control" id="Harga" value="{{old('Harga')}}">
          @if($errors->has('Harga'))
          <span class="help-block">{{($errors->first('Harga'))}}</span>
          @endif
        </div>
        <div class="form-group">
          <label for="StatusLegalitas">Status Legalitas</label>
          <select class="form-control" id="StatusLegalitas">
            <option>Belum Selesai</option>
            <option>Sudah Selesai</option>
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
      <h6 class="m-0 font-weight-bold text-primary">Daftar Legalitas</h6>
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
            <th>ID</th>
            <th>No Legalitas</th>
            <th>Tanggal Terbit</th>
            <th>No Unit</th>
            <th>Tipe</th>
            <th>Luas Tanah</th>
            <th>Luas Bangunan</th>
            <th>Status Legalitas</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr class="text-center">
            <td>1</td>
            <td>2</td>
            <td>28-09-2021</td>
            <td>32</td>
            <td>1a</td>
            <td>321</td>
            <td>300</td>
            <td>Belum Selesai</td>
            <td class="text-center">
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