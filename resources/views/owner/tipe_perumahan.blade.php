@extends('owner.layouts.master')
@section('content')

<ol class="breadcrumb">
  <li><i class="fa fa-home"></i><a href="/">&nbsp;Home&nbsp;</a></li>
  <li>&#47;&nbsp;<i class="fas fa-people-carry"></i>&nbsp;Data Tipe Perumahan&nbsp;</li>
</ol>

<!-- Table -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="col-sm-12 col-md-6">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Tipe Perumahan</h6>
    </div>
  </div>
  <div class="card-body" style="font-size: 15px;">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <!-- <div class="row">
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
        </div> -->
        <thead style="background-color: #ddd;">
          <tr class="text-center">
            <th>Tipe ID</th>
            <th>Luas Tanah</th>
            <th>Luas Bangunan</th>
            <th>Harga</th>
          </tr>
        </thead>
        <tbody>
          <tr class="text-center">
            <td>1</td>
            <td>312</td>
            <td>300</td>
            <td>Rp. 500.000</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection