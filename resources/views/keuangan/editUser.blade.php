@extends('keuangan.layouts.master')
@section('content')

@if(session('sukses')) 
    <div class="alert alert-success" role="alert">
      {{session('sukses')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>
  @endif
   <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="/dashboard">&nbsp;Home&nbsp;</a></li>
              <li>&#47;&nbsp;<i class="fa fa-users"></i><a href="/User">&nbsp;Data User&nbsp;</a></li>
              <li>&#47;&nbsp;<i class="fa fa-cogs"></i>&nbsp;Edit</li>
            </ol>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="col-sm-12 col-md-6">
      <h6 class="m-0 font-weight-bold text-primary">Edit Data User</h6>
      </div>
    </div>
    <div class="card-body" style="font-size: 15px;">
    <div class="table-responsive">
    <form action="" method="POST" enctype="multipart/form-data" >
              {{csrf_field()}}
      <div class="form-group">
        <label >Nama</label>
        <input name="nama" type="text" class="form-control" id="nama" value="" >
        @if($errors->has('name'))
                <span class="help-block">{{($errors->first('name'))}}</span>
        @endif
      </div>
      <div class="form-group">
        <label >Email</label>
        <input name="email" type="email" class="form-control" id="email" value="">
      
      </div>
      <div class="form-group">
        <label >Password</label>
        <input type="text" class="form-control" id="password" name="password" value="">
        
      </div>
      <div class="form-group">
        <label >Role</label>
        <select class="form-control" id="status" name="status">
          <option value="" disabled>Role</option>
          <option value="" disabled>Anu</option>
        </select>
      </div>
      <button type="button" class="btn btn-secondary"><a href="/user" style="text-decoration: none; color: #fff">Batal</a></button>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    </form>
  </div>
  </div>

@endsection