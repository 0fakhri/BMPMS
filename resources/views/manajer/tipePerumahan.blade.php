@extends('manajer.layouts.master')
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
  <li>&#47;&nbsp;<i class="fas fa"></i>&nbsp;Tipe Perumahan&nbsp;</li>
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
        <form action="/manajer/tipeperumahan" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="form-group ">
            <label>Nama Tipe</label>
            <input name="NamaTipe" type="text" class="form-control" id="NamaTipe">
            @if($errors->has('NamaTipe'))
            <span class="help-block">{{($errors->first('NamaTipe'))}}</span>
            @endif
          </div>
          <div class="form-group ">
            <label>Luas Tanah</label>
            <input name="LuasTanah" type="number" class="form-control" id="LuasTanah">
            @if($errors->has('LuasTanah'))
            <span class="help-block">{{($errors->first('LuasTanah'))}}</span>
            @endif
          </div>
          <div class="form-group">
            <label>Luas Bangunan</label>
            <input name="LuasBangunan" type="number" class="form-control" id="LuasBangunan">
          </div>
          <div class="form-group">
            <label>Harga</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">Rp</div>
              </div>
              <input type="number" name="Harga" id="Harga" class="form-control" id="Harga">
            </div>
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
<!-- Modal edit tipe -->
<div class="modal fade" id="edittipe" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Edit Tipe</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" id="editForm" enctype="multipart/form-data">
          {{csrf_field()}}
          @method('PUT')
          <div class="form-group ">
            <label>Nama Tipe</label>
            <input name="NamaTipe_edit" type="text" class="form-control" id="NamaTipe_edit">
            @if($errors->has('NamaTipe_edit'))
            <span class="help-block">{{($errors->first('NamaTipe_edit'))}}</span>
            @endif
          </div>
          <div class="form-group ">
            <label>Luas Tanah</label>
            <input name="LuasTanah_edit" type="number" class="form-control" id="LuasTanah_edit">
            @if($errors->has('LuasTanah'))
            <span class="help-block">{{($errors->first('LuasTanah'))}}</span>
            @endif
          </div>
          <div class="form-group">
            <label>Luas Bangunan</label>
            <input name="LuasBangunan_edit" type="number" class="form-control" id="LuasBangunan_edit">
          </div>
          <div class="form-group">
            <label>Harga</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">Rp</div>
              </div>
              <input type="number" name="Harga_edit" id="Harga_edit" class="form-control" id="Harga_edit">
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#showmessage">Update Data</button>
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
      <h6 class="m-0 font-weight-bold text-primary">Tipe Perumahan</h6>
    </div>
  </div>
  <div class="card-body" style="font-size: 15px;">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

        <thead style="background-color: #ddd;">
          <tr class="text-center">
            <th>Tipe ID</th>
            <th>Nama Tipe</th>
            <th>Lunas Tanah</th>
            <th>Lunas Bangunan</th>
            <th>Harga</th>
            <th>Aksi</th>
          </tr>
        </thead>

        <tbody>
          @foreach($tipeperumahan as $tp)
          <tr class="text-center">
            <th>{{$tp->TipeID}}</th>
            <th>{{$tp->NamaTipe}}</th>
            <th>{{$tp->LuasTanah}}</th>
            <th>{{$tp->LuasBangunan}}</th>
            <th>{{$tp->Harga}}</th>
            <th>
              <a href="" data-toggle="modal" data-target="#edittipe" class="btn btn-sm btn-outline-primary fa fa-edit edit">Update</a>
              <form class="d-inline" action="/manajer/tipeperumahan/{{ $tp->TipeID }}/hapus" method="post">
                @method('delete')
                @csrf
                <button class="btn btn-sm btn-outline-danger"><i class="fas fa-times"></i> Hapus</button>
              </form>
            </th>
          </tr>
          @endforeach
        </tbody>

      </table>

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

      $('#NamaTipe_edit').val(data[1]);
      $('#LuasTanah_edit').val(data[2]);
      $('#LuasBangunan_edit').val(data[3]);
      $('#Harga_edit').val(data[4]);
      $('#editForm').attr('action', '/manajer/tipeperumahan/' + data[0]);
      // $('#editdata').modal('show');
    });
  });
</script>
@endsection