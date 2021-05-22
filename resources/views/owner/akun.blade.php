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
  <li>&#47;&nbsp;<i class="fas fa-people-carry"></i>&nbsp;Data Akun&nbsp;</li>
</ol>

<!-- Modal tmbah Akun -->
<div class="modal fade" id="createdata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel">Form Tambah Akun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
     </div>
     <div class="modal-body">
      <form action="" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group ">
          <label >Username</label>
          <input name="Username" type="text" class="form-control" id="Username" value="{{old('Username')}}">
          @if($errors->has('Username'))
          <span class="help-block">{{($errors->first('Username'))}}</span>
          @endif
        </div>
        <div class="form-group">
          <label >Email</label>
          <input name="Email" type="email" class="form-control" id="Email" value="{{old('Email')}}">
          @if($errors->has('Email'))
          <span class="help-block">{{($errors->first('Email'))}}</span>
          @endif
        </div>
        <div class="form-group">
          <label >Password</label>
          <input name="Password" type="password" class="form-control" id="Password" value="{{old('Password')}}">
          @if($errors->has(''))
          <span class="help-block">{{($errors->first('Password'))}}</span>
          @endif
        </div>
        <div class="form-group">
          <label for="Role">Role</label>
          <select class="form-control" id="Role">
            <option>Manager</option>
            <option>Keuangan</option>
            <option>Marketing</option>
            <option>Kontraktor</option>
          </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#showmessage">Buat Akun</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>

<!-- end Modal tmbah paket -->
<div class="row" style="margin-bottom:10px">
  <div class="col-sm-12 col-md-6">
    <button type="button" class="btn btn-primary btn-rounded btn-outline
    hidden-xs hidden-sm waves-effect waves-light" data-toggle="modal" data-target="#createdata">
    <i class="fa fa-plus-square fa-fw" aria-hidden="true"></i>Tambah Akun</button>
  </div>
</div>

<!-- Modal edit akun -->
<div class="modal fade" id="editdata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel">Form Edit Akun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
     </div>
     <div class="modal-body">
      <form action="/data_akun/create" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group ">
          <label >Username</label>
          <input name="Username" type="text" class="form-control" id="Username" value="{{old('Username')}}">
          @if($errors->has('Username'))
          <span class="help-block">{{($errors->first('Username'))}}</span>
          @endif
        </div>
        <div class="form-group">
          <label >Email</label>
          <input name="Email" type="email" class="form-control" id="Email" value="{{old('Email')}}">
          @if($errors->has('Email'))
          <span class="help-block">{{($errors->first('Email'))}}</span>
          @endif
        </div>
        <div class="form-group">
          <label >Password</label>
          <input name="Password" type="password" class="form-control" id="Password" value="{{old('Password')}}">
          @if($errors->has(''))
          <span class="help-block">{{($errors->first('Password'))}}</span>
          @endif
        </div>
        <div class="form-group">
          <label for="Role">Role</label>
          <select class="form-control" id="Role">
            <option>Manager</option>
            <option>Keuangan</option>
            <option>Marketing</option>
            <option>Kontraktor</option>
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
      <h6 class="m-0 font-weight-bold text-primary">Daftar Akun</h6>
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
            <th>User ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr class="text-center">
            <td>1</td>
            <td>rendi</td>
            <td>rendi@gmail.com</td>
            <td>manajer</td>
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