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
  <span class="help-block">{{$errors}}Data tidak boleh kosong / Data yang diisi tidak valid, isi data dengan benar</span>
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
        <form action="{{url('/owner/akun')}}" id="createForm" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="form-group ">
            <label>Nama</label>
            <input name="name" type="text" class="form-control" id="name">
            @if($errors->has('name'))
            <span class="help-block">{{($errors->first('name'))}}</span>
            @endif
          </div>
          <div class="form-group">
            <label>Email</label>
            <input name="email" type="text" class="form-control" id="email">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input name="password" type="password" class="form-control" id="password">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Role</label>
            <select class="form-control" id="role" name="role">
              <option disabled>Role</option>
              <option value="Manajer">Manajer</option>
              <option value="Divisi Keuangan">Divisi Keuangan</option>
              <option value="Divisi Marketing">Divisi Marketing</option>
              <option value="Kontraktor">Kontraktor</option>
              <option value="Supplier">Supplier</option>
            </select>
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
<div class="row" style="margin-bottom:10px">
  <div class="col-sm-12 col-md-6">
    <button type="button" class="btn btn-primary btn-rounded btn-outline
    hidden-xs hidden-sm waves-effect waves-light" data-toggle="modal" data-target="#createdata">
      <i class="fa fa-plus-square fa-fw" aria-hidden="true"></i>Tambah Akun</button>
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
          <form method="get" action="{{url('')}}" role="search">
            <div class="col-sm-12 col-md-4">
              <div id="dataTable_filter" class="dataTables_filter">
                <label>Search:<input name="cari" type="text" class="form-control form-control-sm" placeholder="" aria-describedby="basic-addon2"></label>
                <button class="btn btn-outline-info" type="submit" style="height: 2rem">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
        <thead style="background-color: #ddd;">
          <tr class="text-center">
            <th>User ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($dataUser as $du)
          <tr class="text-center">
            <td>{{$du->id}}</td>
            <td>{{$du->name}}</td>
            <td>{{$du->email}}</td>
            <td>{{$du->role}}</td>
            <!-- <th>
              <a href="/user/{{$du->id}}/edit" class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i>Update</a>
              <form class="d-inline" action="/user/{{$du->id}}/hapus" method="post">
                @method('delete')
                @csrf
                <button class="btn btn-sm btn-outline-danger"><i class="fa fa-trash fa-fw"></i> Hapus</button>
              </form>
            </th> -->
            <td>
              <button type="button" class="btn btn-sm btn-outline-warning edit" data-toggle="modal" data-target="#editdata">
                <i class="fa fa-edit fa-fw" aria-hidden="true"></i>Edit</button>
              <!-- <button type="button" class="btn btn-sm btn-outline-danger">
                <i class="fa fa-trash fa-fw" aria-hidden="true"></i>Hapus</button> -->
              @if($du->role != 'Owner')
              <form class="d-inline" action="/owner/akun/{{$du->id}}" method="post">
                @method('delete')
                @csrf
                <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash fa-fw"></i> Hapus</button>
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
        <form action="" method="POST" enctype="multipart/form-data" id="editForm">
          {{csrf_field()}}
          @method('PUT')
          <div class="form-group ">
            <label>Username</label>
            <input name="name_edit" type="text" class="form-control" id="name_edit" value="">
            @if($errors->has('name_edit'))
            <span class="help-block">{{($errors->first('Username'))}}</span>
            @endif
          </div>
          <div class="form-group">
            <label>Email</label>
            <input name="email_edit" type="email" class="form-control" id="email_edit" value="">
            @if($errors->has('email_edit'))
            <span class="help-block">{{($errors->first('email_edit'))}}</span>
            @endif
          </div>
          <div class="form-group">
            <label>Password</label>
            <input name="password_edit" type="password" class="form-control" id="password_edit" value="">
            @if($errors->has('password_edit'))
            <span class="help-block">{{($errors->first('password_edit'))}}</span>
            @endif
          </div>
          <div class="form-group">
            <label for="Role">Role</label>
            <select class="form-control" id="role_edit" name="role_edit">
              <option disabled>Role</option>
              <?php
              $role = array('Manajer', 'Divisi Keuangan', 'Divisi Marketing', 'Kontraktor', 'Supplier');
              ?>
              @for ($i = 0; $i < 5; $i++)<option value="{{$role[$i]}}">{{$role[$i]}}</option>
                @endfor
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

@endsection
@section('script')
<script type="text/javascript">
  $(document).ready(function() {
    var table = $('#dataTable').DataTable();

    table.on('click', '.edit', function() {
      $tr = $(this).closest('tr');
      if ($($tr).hasClass('Child')) {
        $tr = $tr.prev('.parent');
      }

      var data = table.row($tr).data();
      console.log(data);

      $('#name_edit').val(data[1]);
      $('#email_edit').val(data[2]);
      $('#role_edit').val(data[3]);
      $('#editForm').attr('action', '/owner/akun/' + data[0]);
      // $('#editdata').modal('show');
    });
  });
</script>
@endsection