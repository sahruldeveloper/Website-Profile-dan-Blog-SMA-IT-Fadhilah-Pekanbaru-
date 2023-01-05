{{-- <section id="topbar">
     <div class="container">
       <div class="row">
         <div class="col-md-8">
           <ul class="top-contact">
             <li><a href="#"><i class="fas fa-phone"></i>08921212121</a></li>
             <li><a href="#"><i class="fas fa-envelope"></i>SMA_IT_Fadhilah@sch.id</a></li>
             <li><a href="#"><i class="fas fa-bullhorn"></i>PPDB TA 2020/2021</a></li>
           </ul>
        </div>
        <div class="col-md-4">
          <div class="sosmed">
            <li><a href="" class="fab fa-facebook"></a></li>
            <li><a href="" class="fab fa-instagram"></a></li>
            <li><a href="" class="fab fa-twitter"></a></li>
            <li><a href="" class="fab fa-youtube"></a></li>
          </div>
        </div>
       </div>
     </div>
   </section> --}}
<div class="section-header">
  <header>
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="brand">
            <img src="{{ url('frontend/assets/img/logo-sekolah.png') }}" data-aos="fade-in" data-aos-offset="200" style="height: 90px; width: 90px;" alt="">
            <div class="brand-name" data-aos="fade-right" data-aos-offset="200">
              <h1>SMA IT FADHILAH</h1>
              <h3>Sekolah Hebat | Sekolah Juara
              </h3>
            </div>
            
          </div>
        </div>
        {{-- <div class="col-md-4 searchbox-wrapper">
          <div class="searchbox">
            <form action="" method="get">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Cari sesuatu">
                <div class="input-group-append">
                  <button class="btn btn-primary" id="tombol-cari">Cari</button>
                </div>
              </div>
            </form>
          </div>
        </div> --}}
      </div>  
    </div>
  </header>

  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-navbar ">
    <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarNav">
        <ul class="navbar-nav mr-auto ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('home') }}">Beranda</a>
          </li>

          <li class="nav-item dropdown">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profile</a>
            <div class="dropdown-menu">
              <a href="{{ route('sejarah') }}" class="dropdown-item">Sejarah</a>
              <a href="{{ route('visidanmisi') }}" class="dropdown-item">Visi dan Misi</a>
              
            </div>
          </li>

          {{-- <li class="nav-item dropdown">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sarana & Prasarana</a>
            <div class="dropdown-menu">
              <a href="{{ route('sarana-prasarana') }}" class="dropdown-item">Sarana Infrastruktur</a>
              <a href="#" class="dropdown-item">Sarana Pembelajaran</a>
            </div>
          </li> --}}

          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}#tenaga-pendidik">Guru</a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}#ekstrakulikuler">Ekstrakurikuler</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('prestasi-lengkap') }}">Prestasi</a>
          </li>
          <li class="nav-item">
           <a class="nav-link" href="{{ route('home') }}#berita">Berita</a>
         </li>
          
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}#footer">Kontak</a>
          </li>
          {{-- @guest
          <form class="form-inline d-sm-block d-md-none">
       
          <button class="btn btn-login my-2 my-sm-0" type="button" onclick="event.preventDefault(); location.href='{{ url('login')}}';">
             Login
           </button>
         </form>
         <!-- Desktop Button -->
         <form class="form-inline my-2 my-lg-0 d-none d-md-block">
     
         <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="button" onclick="event.preventDefault(); location.href='{{ url('login')}}';">
             Login
           </button>
         </form>   
          @endguest
   
          @auth
           
          <form class="form-inline d-sm-block d-md-none" action="{{ url('logout') }}" method="POST">
           @csrf
          <button class="btn btn-login my-2 my-sm-0" type="submit">
             Logout
           </button>
         </form>
         <!-- Desktop Button -->
         <form class="form-inline my-2 my-lg-0 d-none d-md-block" action="{{ url('logout') }}" method="POST">
           @csrf
         <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="submit">
             Logout
           </button>
         </form>   
          @endauth --}}
          
         
        </ul>
      </div>
    </div>
   
  </nav>
  <!-- akhir navbar -->
</div>
  