    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">BMPMS</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="{{url('/dashboard')}}">
          <i class="fas fa-fw fa-home"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->

      <!-- Nav Item - Pages Collapse approval-->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-check"></i>
          <span>Approval</span>
        </a>

        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{url('/data_akun')}}">Approval Kwitansi</a>
            <a class="collapse-item" href="{{url('/data_akun')}}">Draft Pengeluaran</a>
            <a class="collapse-item" href="{{url('/data_akun')}}">Hutang</a>
            <a class="collapse-item" href="{{url('/data_akun')}}">Surat</a>
            <!-- <a class="collapse-item" href="/notfound">Data Order Paket</a> -->
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities transaksi-->
      <li class="nav-item">
        <a class="nav-link" href="{{url('/dashboard')}}">
          <i class="fas fa-shopping-cart"></i>
          <span>Transaksi</span></a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu laporan-->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-folder-open"></i>
          <span>Laporan</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{url('/jurnal_umum')}}">Keuangan</a>
            <a class="collapse-item" href="{{url('/jurnal_umum')}}">Konsumen</a>
            <a class="collapse-item" href="{{url('/jurnal_umum')}}">Proyek</a>
            <a class="collapse-item" href="{{url('/jurnal_umum')}}">Marketing</a>
            <a class="collapse-item" href="{{url('/jurnal_umum')}}">Transaksi</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu Setting Proyek-->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsethree" aria-expanded="true" aria-controls="collapsethree">
          <i class="fas fa-map"></i>
          <span>Setting Proyek</span>
        </a>
        <div id="collapsethree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{url('/buku_besar')}}">Proyek</a>
            <a class="collapse-item" href="{{url('/buku_besar')}}">Unit Perumahan</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu Konfigurasi umum-->
      <li class="nav-item">
       <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefour" aria-expanded="true" aria-controls="collapsefour">
          <i class="fas fa-cogs"></i>
          <span>Konfigurasi Umum</span></a>
          <div id="collapsefour" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{url('/neraca_saldo')}}">Set Email</a>
            <a class="collapse-item" href="{{url('/neraca_saldo')}}">Set Surat</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities about-->
      <li class="nav-item">
        <a class="nav-link" href="{{url('/dashboard')}}">
          <i class="fas fa-info-circle"></i>
          <span>About</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
