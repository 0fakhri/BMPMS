@extends('marketing.layouts.master')
@section('content')


<ol class="breadcrumb">
  <li><i class="fa fa-home"></i><a href="/dashboard">&nbsp;Home&nbsp;</a></li>
  <li>&#47;&nbsp;<i class="fas fa"></i>&nbsp;Tipe Perumahan&nbsp;</li>
</ol>

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
          </tr>
          @endforeach
        </tbody>

      </table>

    </div>
  </div>
</div>

@endsection