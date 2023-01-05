  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
       
       <div class="sidebar-brand-text mx-3">Gege Store Administrator</div>
     </a>

     <!-- Divider -->
     {{-- <hr class="sidebar-divider my-0">
     <li class="nav-item  {{ Request:: path() === 'admin/dashboard' ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="fas fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li> --}}
     
     

    <li class="nav-item {{ Request:: path() === 'admin/berita' ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('berita.index') }}">
        <i class="far fa-newspaper"></i>
        <span>Data Barang</span></a>
    </li>

    <li class="nav-item {{ Request:: path() === 'admin/category' ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('category.index') }}">
        <i class="far fa-newspaper"></i>
        <span>Kategori Barang</span></a>
    </li>

    {{-- 

    

     <!-- Nav Item - Charts -->
     <li class="nav-item {{ Request:: path() === 'admin/guru' ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('guru.index') }}">
        <i class="fas fa-chalkboard-teacher"></i>
        <span>Data Guru</span></a>
    </li> --}}

    <li class="nav-item {{ Request:: path() === 'admin/user' ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('user.index') }}">
        <i class="fas fa-user"></i>
        <span>Data Users</span></a>
    </li>

    {{-- <li class="nav-item {{ Request:: path() === 'admin/alumni' ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('alumni.index') }}">
        <i class="fas fa-user-graduate"></i>
        <span>Alumni</span></a>
    </li> --}}

    {{-- <li class="nav-item {{ Request:: path() === 'admin/prestasi' ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('prestasi.index') }}">
        <i class="fas fa-trophy"></i>
        <span>Data Prestasi</span></a>
    </li> --}}

   

     
     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
       <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

   </ul>
   <!-- End of Sidebar -->