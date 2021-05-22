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
        <a class="nav-link" href="{{url('/user')}}">
          <i class="fas fa-shopping-cart"></i>
          <span>Data User</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/kebutuhan-proyek')}}">
          <i class="fas fa-shopping-cart"></i>
          <span>Data Kebutuhan Proyek</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/konsumen')}}">
          <i class="fas fa-shopping-cart"></i>
          <span>Data Konsumen</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/spr')}}">
          <i class="fas fa-shopping-cart"></i>
          <span>Data SPR</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/verif-spr')}}">
          <i class="fas fa-shopping-cart"></i>
          <span>Verifikasi Data SPR</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/pembayaran')}}">
          <i class="fas fa-shopping-cart"></i>
          <span>Data Pembayaran</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/legalitas')}}">
          <i class="fas fa-shopping-cart"></i>
          <span>Data Legalitas</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/tipe-perumahan')}}">
          <i class="fas fa-shopping-cart"></i>
          <span>Data Tipe Perumahan</span></a>
      </li>

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-check"></i>
          <span>Approval</span>
        </a>

        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{url('/approv-kwitansi')}}">Approval Kwitansi</a>
            <a class="collapse-item" href="{{url('/draft-pengeluaran')}}">Draft Pengeluaran</a>
            <a class="collapse-item" href="{{url('/hutang')}}">Hutang</a>
            <a class="collapse-item" href="{{url('/surat')}}">Surat</a>
          </div>
        </div>
      </li> -->

      <!-- Nav Item - Utilities transaksi-->
      <!-- <li class="nav-item">
        <a class="nav-link" href="{{url('/transaksi')}}">
          <i class="fas fa-shopping-cart"></i>
          <span>Transaksi</span></a>
      </li> -->

      <!-- Nav Item - Utilities Collapse Menu laporan-->
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-folder-open"></i>
          <span>Laporan</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Keuangan:</h6>
            <a class="collapse-item" href="{{url('/perumahan')}}">Kartu Kontrol</a>
            <a class="collapse-item" href="{{url('/rekap-piutang')}}">Rekap Piutang</a>
            <a class="collapse-item" href="{{url('/lap-pemasukan')}}">Laporan Pemasukan</a>
            <a class="collapse-item" href="{{url('/lap-pengeluaran')}}">Laporan Pengeluaran</a>
            <a class="collapse-item" href="{{url('/lap-neraca')}}">Laporan Neraca</a>
            <a class="collapse-item" href="{{url('/lap-laba-rugi')}}">Laporan Laba Rugi</a>
            <a class="collapse-item" href="{{url('/lap-kas')}}">Laporan Kas</a>
            <h6 class="collapse-header">Konsumen:</h6>
            <a class="collapse-item" href="{{url('/daftar-calon')}}">Daftar Calon Konsumen</a>
            <a class="collapse-item" href="{{url('/lap-followup')}}">Laporan Jejak Follow Up</a>
            <a class="collapse-item" href="{{url('/daftar-konsumen')}}">Daftar Konsumen</a>
            <h6 class="collapse-header">Proyek:</h6>
            <a class="collapse-item" href="{{url('/lap-legalitas')}}">Laporan Legalitas</a>
            <a class="collapse-item" href="{{url('/lap-dana')}}">Laporan Dana dan Material</a>
            <h6 class="collapse-header">Marketing:</h6>
            <a class="collapse-item" href="{{url('/sales')}}">Sales</a>
            <h6 class="collapse-header">Transaksi:</h6>
            <a class="collapse-item" href="{{url('/lap-transaksi')}}">Laporan Transaksi</a>
            <a class="collapse-item" href="{{url('/riwayat-transaksi')}}">History Transaksi</a>
            <a class="collapse-item" href="{{url('/pricelist')}}">Sales Pricelist</a>
            <a class="collapse-item" href="{{url('/lap-pembatalan')}}">Laporan Pembatalan Transaksis</a>
          </div>
        </div>
      </li> -->

      <!-- Nav Item - Utilities Collapse Menu Setting Proyek-->
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsethree" aria-expanded="true" aria-controls="collapsethree">
          <i class="fas fa-map"></i>
          <span>Setting Proyek</span>
        </a>
        <div id="collapsethree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{url('/proyek')}}">Proyek</a>
            <a class="collapse-item" href="{{url('/unit-rumah')}}">Unit Perumahan</a>
          </div>
        </div>
      </li> -->

      <!-- Nav Item - Utilities Collapse Menu Konfigurasi umum-->
      <!-- <li class="nav-item">
       <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefour" aria-expanded="true" aria-controls="collapsefour">
          <i class="fas fa-cogs"></i>
          <span>Konfigurasi Umum</span></a>
          <div id="collapsefour" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{url('/set-email')}}">Set Email</a>
            <a class="collapse-item" href="{{url('/set-surat')}}">Set Surat</a>
          </div>
        </div>
      </li> -->

      <!-- Nav Item - Utilities about-->
      <!-- <li class="nav-item">
        <a class="nav-link" href="{{url('/about')}}">
          <i class="fas fa-info-circle"></i>
          <span>About</span></a>
      </li> -->

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
