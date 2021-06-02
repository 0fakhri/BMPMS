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
  <li>&#47;&nbsp;<i class="fas fa"></i>&nbsp;Data SPR (Surat Pemesanan Rumah)&nbsp;</li>
</ol>

<!-- Modal tmbah paket -->
<div class="modal fade" id="editspr" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Edit SPR</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/divmarketing/spr" id="editForm" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="form-group ">
            <label>No. SPR</label>
            <input name="No_SPR_edit" type="text" class="form-control" id="No_SPR_edit">
            @if($errors->has('No_SPR_edit'))
            <span class="help-block">{{($errors->first('No_SPR_edit'))}}</span>
            @endif
          </div>
          <div class="form-group">
            <label for="StatusPersetujuan">Tipe Perumahan</label>
            <select class="form-control" id="TipePerumahan_TipeID_edit" name="TipePerumahan_TipeID_edit">
              <option disabled>Tipe Perumahan</option>
              @foreach($tipeperumahan as $tp)
              <option value="{{$tp->TipeID}}">{{$tp->NamaTipe}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Tanggal Pemesanan</label>
            <input name="TanggalSPR_edit" type="date" class="form-control" id="TanggalSPR_edit">
          </div>
          <div class="form-group">
            <label>Uang Muka</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">Rp</div>
              </div>
              <input type="number" class="form-control" name="UangMuka_edit" id="UangMuka_edit">
            </div>
          </div>
          <div class="form-group">
            <label for="StatusPersetujuan">Konsumen</label>
            <select class="form-control" id="Konsumen_KonsumenID_edit" name="Konsumen_KonsumenID_edit">
              <option disabled>Konsumen</option>
              @foreach($konsumen as $k)
              <option value="{{$k->KonsumenID}}">{{$k->NamaLengkap}}</option>
              @endforeach
            </select>
          </div>
          <div class=" form-group">
            <label>Keterangan</label><br>
            <textarea name="Keterangan_edit" id="Keterangan_edit" cols="55" rows="5"></textarea>
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
            <th hidden></th>
            <th>No. SPR</th>
            <th>Tipe</th>
            <th>Tanggal SPR</th>
            <th>Uang Muka</th>
            <th>Keterangan</th>
            <th>Status</th>
            <th>Nama Konsumen</th>
            <th hidden></th>
            <th hidden></th>
            <th>Aksi</th>
          </tr>
        </thead>

        <tbody>
          @foreach($spr as $s)
          <tr class="text-center">
            <td hidden>{{$s->SPR_ID}}</td>
            <td>{{$s->No_SPR}}</td>
            <td>{{$s->NamaTipe}}</td>
            <td>{{$s->TanggalSPR}}</td>
            <td>{{$s->UangMuka}}</td>
            <td>{{$s->Keterangan}}</td>
            <td>{{$s->StatusSPR}}</td>
            <td>{{$s->NamaLengkap}}</td>
            <td hidden>{{$s->TipeID}}</td>
            <td hidden>{{$s->KonsumenID}}</td>
            <td>
              @if($s->StatusSPR == "Disetujui")
              <a href="/spr/pdf/{{$s->SPR_ID}}" target="_blank" class="btn btn-sm btn-outline-warning"><i class="fas fa-print"></i> Cetak SPR</a><br>
              <a href="/manajer/spr/pembayaran/{{$s->SPR_ID}}" class="mt-2 btn btn-sm btn-outline-primary"><i class="fas fa-eye"></i> Detail Pembayaran</a>
              @elseif($s->StatusSPR == "Ditolak")
              {{__('-')}}
              @else
              <form class="d-inline" action="/manajer/spr/setuju/{{$s->SPR_ID}}" method="post">
                @method('put')
                @csrf
                <button class="btn btn-sm btn-outline-success"><i class="fas fa-check"></i> Setuju</button>
              </form>
              <form class="d-inline" action="/manajer/spr/tolak/{{$s->SPR_ID}}" method="post">
                @method('put')
                @csrf
                <button class="btn btn-sm btn-outline-danger"><i class="fas fa-times"></i> Tolak</button>
              </form>
              <br><a href="" data-toggle="modal" data-target="#editspr" class="mt-2 btn btn-sm btn-outline-warning edit"><i class="fas fa-edit"></i> Edit</a>
              <form class="d-inline" action="/manajer/spr/hapus/{{$s->SPR_ID}}" method="post">
                @method('delete')
                @csrf
                <button class="mt-2 btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i> Hapus</button>
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

      $('#No_SPR_edit').val(data[1]);
      $('#TipePerumahan_TipeID_edit').val(data[8]).attr('selected', true);
      $('#TanggalSPR_edit').val(data[3]);
      $('#UangMuka_edit').val(data[4]);
      $('#Konsumen_KonsumenID_edit').val(data[9]).attr('selected', true);
      $('#Keterangan_edit').val(data[5]);
      $('#editForm').attr('action', '/akun/edit/' + data[0]);
      // $('#editdata').modal('show');
    });
  });
</script>
@endsection