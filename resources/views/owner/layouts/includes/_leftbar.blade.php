    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">BMPMS Owner</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="{{url('/')}}">
          <i class="fas fa-fw fa-home"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Pages Collapse Menu pekerjaan-->
      <li class="nav-item">
        <a class="nav-link" href="{{url('/owner/akun')}}">
          <i class="fas fa-tasks"></i>
          <span>Data Akun</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{url('/owner/pembayaran')}}">
          <i class="fas fa-tasks"></i>
          <span>Data Pembayaran</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{url('/owner/konsumen')}}">
          <i class="fas fa-tasks"></i>
          <span>Data Konsumen</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{url('/owner/proyek')}}">
          <i class="fas fa-tasks"></i>
          <span>Data Proyek</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{url('/owner/legalitas')}}">
          <i class="fas fa-tasks"></i>
          <span>Data Legalitas</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{url('/owner/tipe_perumahan')}}">
          <i class="fas fa-tasks"></i>
          <span>Data Tipe Perumahan</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>