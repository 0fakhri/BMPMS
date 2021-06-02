<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>BMPMS</title>
  <link rel="icon" type="image/png" sizes="20x20" href="{{asset('icon.png')}}">
  <!-- Custom fonts for this template-->
  <link href="{{asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
  <!-- Custom styles for this template-->
  <link href="{{asset('admin/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    @include('manajer.layouts.includes._leftbar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        @include('manajer.layouts.includes._navbar')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          @yield('content')

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy;BMPMS 2021</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->

  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin akan keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Tekan logout untuk keluar</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <form action="{{route('logout')}}" method="post" data-toggle="modal" data-target="#logoutModal">
            @csrf
            <button type="submit" class="btn btn-primary">Logout
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- modal profil -->
  <div class="modal fade" id="profilModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Profil Anda</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="#editprofilModal">
            {{csrf_field()}}
            <div class="form-group ">
              <label>Nama</label>
              <input name="name" type="text" class="form-control" id="name" value="{{auth()->user()->name}}" readonly>
              @if($errors->has('name'))
              <span class="help-block">{{($errors->first('name'))}}</span>
              @endif
            </div>
            <div class="form-group">
              <label>Email</label>
              <input name="email" type="text" class="form-control" id="email" value="{{auth()->user()->email}}" readonly>
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Role</label>
              <input name="role" type="text" class="form-control" id="role" value="{{auth()->user()->role}}" readonly>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editprofilModal">Edit Profil</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- edit profil modal -->
  <div class="modal fade" id="editprofilModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Edit Profil</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/owner/akun/{{auth()->user()->id}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            @method('PUT')
            <div class="form-group ">
              <label>Nama</label>
              <input name="name_edit" type="text" class="form-control" id="name_edit" value="{{auth()->user()->name}}">
              @if($errors->has('name'))
              <span class="help-block">{{($errors->first('name'))}}</span>
              @endif
            </div>
            <div class="form-group">
              <label>Email</label>
              <input name="email_edit" type="text" class="form-control" id="email_edit" value="{{auth()->user()->email}}">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input name="password_edit" type="password" class="form-control" id="password_edit">
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Role</label>
              <input name="role_edit" type="text" class="form-control" id="role_edit" readonly value="{{auth()->user()->role}}">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#showmessage">Update Profil</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('admin/js/sb-admin-2.min.js')}}"></script>
  <script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>


  <!-- Page level plugins -->
  <script src="{{asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('admin/js/demo/datatables-demo.js')}}"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/af-2.3.5/sp-1.2.2/datatables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
  @yield('script')

</body>

</html>