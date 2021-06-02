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
  <span class="help-block">{{$$errors}}Data tidak boleh kosong / Data yang diisi tidak valid, isi data dengan benar</span>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<ol class="breadcrumb">
  <li><i class="fa fa-home"></i><a href="/dashboard">&nbsp;Home&nbsp;</a></li>
  <li>&#47;&nbsp;<i class="fas fa"></i>&nbsp;Data Pembayaran&nbsp;</li>
</ol>

<!-- end Modal tmbah paket -->
@if($StatusBayar != 'Lunas')
<div class="row" style="margin-bottom:10px">
  <div class="col-sm-12 col-md-6">
    <button type="button" class="btn btn-danger btn-rounded btn-outline
    hidden-xs hidden-sm waves-effect waves-light" data-toggle="modal" data-target="#createdata">
      <i class="fa fa-plus-square fa-fw" aria-hidden="true"></i>Tambah Data</button>
  </div>
</div>
@endif

<!-- Modal tmbah paket -->
<div class="modal fade" id="createdata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/pembayaran/{{$spr->SPR_ID}}" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          <!-- <div class="form-group ">
            <label >Tanggal Transaksi</label>
            <input name="nama_akun" type="date" class="form-control" id="nama_akun">
            @if($errors->has('akun'))
              <span class="help-block">{{($errors->first('nama_akun'))}}</span>
            @endif
          </div> -->
          <div class="form-group">
            <label>Nominal Transaksi</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">Rp</div>
              </div>
              <input type="number" class="form-control" id="NominalTransaksi" name="NominalTransaksi">
            </div>
          </div>
          <div class="form-group">
            <label>Bukti Pembayaran</label>
            <input name="BuktiTransaksi" type="file" class="form-control" id="BuktiTransaksi" value="">
            <i></i>
          </div>
          <div class="form-group">
            <label>Keterangan</label>
            <input name="Keterangan" type="text" class="form-control" id="Keterangan">
          </div>
          <!-- <div class="form-group">
            <label >Status Pembayaran</label>
            <input name="kode_akun" type="text" class="form-control" id="kode_akun">
          </div> -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#showmessage">Tambah data</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end modal -->

<!-- Modal edit paket -->
<div class="modal fade" id="editdata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Edit Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/pembayaran/{{$spr->SPR_ID}}" id="editform" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          @method('PUT')
          <!-- <div class="form-group ">
            <label >Tanggal Transaksi</label>
            <input name="nama_akun" type="date" class="form-control" id="nama_akun">
            @if($errors->has('akun'))
              <span class="help-block">{{($errors->first('nama_akun'))}}</span>
            @endif
          </div> -->
          <div class="form-group">
            <label>Nominal Transaksi</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">Rp</div>
              </div>
              <input type="number" class="form-control" id="NominalTransaksi_edit" name="NominalTransaksi_edit">
            </div>
          </div>
          <div class="form-group">
            <label>Bukti Pembayaran</label>
            <input name="BuktiTransaksi_edit" type="file" class="form-control" id="BuktiTransaksi_edit" value="">
            <i></i>
          </div>
          <div class="form-group">
            <label>Keterangan</label>
            <input name="Keterangan_edit" type="text" class="form-control" id="Keterangan_edit" value="">
          </div>
          <!-- <div class="form-group">
            <label >Status Pembayaran</label>
            <input name="kode_akun" type="text" class="form-control" id="kode_akun">
          </div> -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#showmessage">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end modal -->


<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="col-sm-12 col-md-6">
      <h6 class="m-0 font-weight-bold text-primary">Detail SPR</h6>
    </div>
  </div>
  <div class="container">
    <table border="0">
      <tbody>
        <tr>
          <td><b>No SPR</b></td>
          <td>:</td>
          <td><b>{{$spr->No_SPR}}</b><br></td>
        </tr>
        <tr>
          <td>Nama Konsumen</td>
          <td>:</td>
          <td>{{$spr->NamaLengkap}}<br></td>
        </tr>
        <tr>
          <td>Tanggal SPR</td>
          <td>:</td>
          <td>{{$spr->TanggalSPR}}</td>
        </tr>
        <tr>
          <td>Tipe Rumah</td>
          <td>:</td>
          <td>{{$spr->NamaTipe}}</td>
        </tr>
        <tr>
          <td>Uang Muka</td>
          <td>:</td>
          <td>{{$spr->UangMuka}}</td>
      </tbody>
    </table>
  </div>
</div>

<!-- Table -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="col-sm-12 col-md-6">
      <h6 class="m-0 font-weight-bold text-primary">Data Pembayaran</h6>
    </div>
  </div>
  <div class="card-body" style="font-size: 15px;">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

        <thead style="background-color: #ddd;">
          <tr class="text-center">
            <th hidden></th>
            <th>TransaksiID</th>
            <th>Tanggal Transaksi</th>
            <th>Nominal Transaksi</th>
            <th>Sisa Pembayaran</th>
            <th>Bukti Pembayaran</th>
            <th>Keterangan</th>
            <th>Status Pembayaran</th>
            <!-- <th>Aksi</th> -->
          </tr>
        </thead>

        <tbody>
          @foreach($pembayaran as $pb)
          <tr class="text-center">
            <td hidden>{{$pb->BuktiTransaksi}}</td>
            <td>{{$pb->TransaksiID}}</td>
            <td>{{$pb->TanggalTransaksi}}</td>
            <td>{{$pb->NominalTransaksi}}</td>
            <td>{{$pb->SisaPembayaran}}</td>
            <td><a href="" class="gambar" data-toggle="modal" data-target="#lihatBukti"><img src="{{ asset('fileupload/BuktiPembayaran/'. $pb->BuktiTransaksi)}}" alt="" width="100"></a>
            </td>

            <td>{{$pb->Keterangan}}</td>
            <td>
              @if($pb->StatusPembayaran == 'Lunas')
              <span class="my-2 btn btn-success">{{$pb->StatusPembayaran}}</span>
              @else
              {{$pb->StatusPembayaran}}
              @endif
            </td>
            <!-- <td>
              <a href="" class="mt-2 btn btn-sm btn-outline-warning edit" data-toggle="modal" data-target="#editdata">Edit</a>
              <form class="d-inline" action="/manajer/spr/hapus/{{$pb->TransaksiID}}" method="post">
                @method('delete')
                @csrf
                <button class="mt-2 btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i> Hapus</button>
              </form>
            </td> -->
          </tr>
          @endforeach
        </tbody>

      </table>

    </div>
  </div>
</div>

<!-- Modal tmbah paket -->
<div class="modal fade" id="lihatBukti" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <!-- <div class="modal-content"> -->
    <div class="modal-body">
      <div class="mx-auto">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <img src="" id="gambarBukti" alt="">
      </div>
    </div>
    <!-- </div> -->
  </div>
</div>
<!-- end modal -->

@endsection

@section('script')
<script type="text/javascript">
  $(document).ready(function() {
    var table = $('#dataTable').DataTable();

    table.on('click', '.gambar', function() {
      $tr = $(this).closest('tr');
      if ($($tr).hasClass('Child')) {
        $tr = $tr.prev('.parent');
      }

      var data = table.row($tr).data();
      console.log(data);
      $('#gambarBukti').attr('src', '/fileupload/BuktiPembayaran/' + data[0]);
      // $('#editdata').modal('show');
    });
  });
</script>
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
      $('#Keterangan_edit').val(data[6]);
      $('#NominalTransaksi_edit').val(data[3]);
      $('#BuktiTransaksi_edit').val(data[5]);

      $('#editform').attr('action', '/pembayaran/edit/' + data[1]);
      // $('#editdata').modal('show');
    });
  });
</script>
@endsection