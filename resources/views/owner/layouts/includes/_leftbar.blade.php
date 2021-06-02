    @if(auth()->user()->role == 'Owner')
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
        <a class="nav-link" href="{{url('/owner')}}">
          <i class="fas fa-fw fa-home"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Pages Collapse Menu pekerjaan-->
      <li class="nav-item">
        <a class="nav-link" href="{{url('/owner/akun')}}">
          <i class="fas fa-tasks"></i>
          <span>Data User</span></a>
      </li>


      <li class="nav-item">
        <a class="nav-link" href="{{url('/owner/spr')}}">
          <i class="fas fa-tasks"></i>
          <span>Data SPR</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{url('/owner/konsumen')}}">
          <i class="fas fa-tasks"></i>
          <span>Data Konsumen</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{url('/owner/proyek')}}">
          <i class="fas fa-tasks"></i>
          <span>Data Kebutuhan Proyek</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{url('/owner/legalitas')}}">
          <i class="fas fa-tasks"></i>
          <span>Data Legalitas</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{url('/owner/tipeperumahan')}}">
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

    @elseif (auth()->user()->role == 'Kontraktor')
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">BMPMS kontraktor</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="{{url('/kontraktor')}}">
          <i class="fas fa-fw fa-home"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Pages Collapse Menu pekerjaan-->
      <li class="nav-item">
        <a class="nav-link" href="{{url('/kontraktor/kproyek')}}">
          <i class="fas fa-tasks"></i>
          <span>Data Kebutuhan Proyek</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>

    @elseif (auth()->user()->role == 'Supplier')
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">BMPMS Supplier</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="{{url('/supplier')}}">
          <i class="fas fa-fw fa-home"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">


      <li class="nav-item">
        <a class="nav-link" href="{{url('/supplier/mproyek')}}">
          <i class="fas fa-tasks"></i>
          <span>Data Material Proyek</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    @endif