@extends('layouts.app')

@section('title')
    Beranda
@endsection

@section('content')
    <!-- section hero area -->
    <section id="hero-area">
     <div id="slider-hero-nav"></div>
       <div class="owl-carousel" id="slider-hero">
         <div class="slider-item">
           <div class="slider-item-img">
             <img src="{{ url('frontend/assets/img/foto-1.jpg') }}" data-aos="fade-in" alt="">
           </div>
           <div class="slider-item-content">
             <h2>Selamat Datang di SMA IT FADHILAH PEKANBARU</h2>
             {{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, vel. Animi maiores, adipisci ea nemo dicta ad consectetur tenetur quasi?</p>
             <button class="btn btn-primary">DAFTAR PPDB</button> --}}
           </div>
         </div>
         <div class="slider-item">
           <div class="slider-item-img">
             <img src="{{ url('frontend/assets/img/hero-2.jpeg') }}" alt="">
           </div>
           {{-- <div class="slider-item-content">
             <h2>Title2</h2>
             <p> ad consectetur tenetur quasi?</p>
             <button class="btn btn-primary">CTA BUTTON</button>
           </div> --}}
         </div>
       </div>
   </section>
   <!-- akhir section hero area -->

   <section id="sambutan">
     <div class="container" >
       <h2>PROFILE SMA IT FADHILLAH</h2>
       <div class="row">
       
         <div class="col-md-6 col-sm-5 " data-aos="fade-right" data-aos-duration="1500">
          
           <div class="video-wrapper">
             <iframe width="500" height="315" src="https://www.youtube.com/embed/H7lij1-TkBk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
           </div>
         </div>
         <div class="col-md-6 col-sm-6 pl-4" data-aos="fade-left" data-aos-duration="1500">
           <h3>Sambutan Kepala Sekolah</h3>
           <p style="text-align:justify; line-height:2;">Assalamulaikum wr.wb</p>
            <p style="text-align:justify; line-height:2;">{{ str_limit($kalimat, 580 ) }}</p>
           
           
         </div>
       </div>
     </div>
   </section>

   <section id="berita">
     <div class="container " data-aos="fade-down" data-aos-duration="1200" data-aos-offset ="500">
       <div class="section-title">
         <h2>Berita Terbaru</h2>
       </div>
       @forelse ($data as $berita)
       <div class="section-item">
        <div class="row">
          <div class="col-md-6 ">
            <img class="section-item-thumbnail" style="max-height: 400px;" src="{{ asset('storage/uploads/' . $berita->gambar) }}"  alt="">
          </div>
          <div class="col-md-6 col-item-kanan">
           
            <div class="section-item-title">
              <a href="{{ route('berita-detail', $berita->slug) }}"><h3>{{ $berita->judul }}</h3></a>
          
              <div class="section-item-meta">
                <span><i cla ss="far fa-calendar-alt"></i>{{ $berita->created_at->diffForHumans() }}</span>
                <span><i class="fas fa-map-marked-alt"></i>Pekanbaru</span>
              </div>
            </div>
              <div class="section-item-body">
               <p>{!! str_limit($berita->isi, 180) !!}</p>
              </div>
          </div>
        </div>
       
      </div>
      
       @empty
           
       @endforelse
         
       <div class="btn-selengkapnya">
         <a href="{{ route('berita-lengkap') }}" class="btn btn-more">Lihat Selengkapnya</a>
       </div>
     </div>
   </section>

   <section id="ekstrakulikuler" >
     <div class="container" data-aos="fade-in" data-aos-duration="1200" data-aos-offset="500" >
       <div class="section-title">
         <h2>Ekstrakurikuler</h2>
       </div>
       <div class="section-body ekstrakurikuler-item">
         <div class="row">
           <div class="col-md-4 mb-4">
             <div class="section-body-item">
                   <h5>Pramuka</h5>
             </div>
           </div>
           
           <div class="col-md-4 mb-4">
             <div class="section-body-item">
                   <h5>Pencak Silat</h5>
              </div>
           </div>

           <div class="col-md-4">
             <div class="section-body-item">
                   <h5>Marawis</h5>
             </div>
           </div>
           
          
         </div>

         <div class="row mt-3">
          <div class="col-md-4 mb-4">
            <div class="section-body-item">
                  <h5>Futsal</h5>
            </div>
          </div>
          
          <div class="col-md-4 mb-4">
            <div class="section-body-item">
                  <h5>Muhadhoroh</h5>
             </div>
          </div>

          <div class="col-md-4">
            <div class="section-body-item">
                  <h5>Nasyid</h5>
            </div>
          </div>
          
         
        </div>
       </div>
     </div>
   </section>

   <!-- tenaga pendidik -->
   <section id="tenaga-pendidik" class="top-section">
     <div class="container" data-aos="fade-down" data-aos-duration="1200" data-aos-offset ="500">
       <div class="section-title">
         <h2>Tenaga Pendidik</h2>
       </div>
      
       <div class="section-body">
         <div id="slider-tools-1"></div>
       
         <div class="owl-carousel" id="tenaga-pendidik-slider">
          @forelse ($guru as $item)
           <div class="section-item-slider">
             
            <a href=""> <img class="section-item-thumbnail"  src="{{ asset('storage/uploads/' . $item->foto) }}"  alt=""></a>
            <div class="section-item-caption">
             <a href=""><h5>{{ $item->nama_guru }}</h5></a>
             <h6>{{ $item->jabatan }}</h6>
            </div>
           
           </div>
           @empty
               
           @endforelse
           

           
       </div>
       <div class="btn-selengkapnya mt-4">
         <a href="{{ route('guru-lengkap') }}" class="btn btn-more">Guru Lainnya</a>
       
       </div>

     </div>
   </section>
   <!-- akhir tenaga pendidik -->

   <section id="alumni" class="top-section">
    <div class="container">
      <div class="section-title">
        <h2>Profil Alumni</h2>
      </div>
      <div class="section-body">
        <div id="slider-tools-2"></div>
        <div class="owl-carousel" id="alumni-slider">
          <div class="section-item-slider">
            <div class="row">
              <div class="col-md-5 col-sm-6">
                <img src="{{ url('frontend/assets/img/alumni-1.jpeg') }}" class="foto-alumni" alt="">
              </div>
              <div class="col-md-7 col-sm-6">
                <div class="section-item-content">
                  <h3>Oloan Novari</h3>
                  <h5>Angkatan I</h5>
                  <p>Kesan kami bersekolah disini menyenangkan,sekolah ini telah membentuk kami menjadi pribadi yang cerdas,kreatif dan berkarakter islami.</p>
                  {{-- <a  href="" class="more">Selengkapnya <i class="fas fa-arrow-right"></i></a> --}}
                </div>
              </div>
            </div>
          </div>
          <div class="section-item-slider">
            <div class="row">
              <div class="col-md-5 col-sm-5">
                <img src="{{ url('frontend/assets/img/alumni-2.jpeg') }}" class="foto-alumni" alt="">
              </div>
              <div class="col-md-7 col-sm-7">
                <div class="section-item-content">
                  <h3>Aldi Sastradi</h3>
                  <h5>Angkatan II</h5>
                  <p>Kami sangat senang bersekolah disini. Guru tidak hanya mengajar,tapi juga mendidik kami menjadi siswa yang berakhlak mulai serta ditunjang dengan fasilitas yang lengkap yang membuat kami nyaman belajar disini. </p>
                  {{-- <a  href="" class="more">Selengkapnya <i class="fas fa-arrow-right"></i></a> --}}
                </div>
              </div>
            </div>
          </div>
        </div>
        
          
        </div>
      
      </div>
    </div>
  </section>

   {{-- <!-- galery -->
  <section id="gallery">
    <div class="container">
      <div class="section-title">
        <h2>Gallery / Dokumentasi</h2>
      </div>

      <div class="section-body">
        <div id="slider-tools-3"></div>
        <div class="owl-carousel" id="gallery-slider">
           <div class="section-item-slider">
             <img src="{{ url('frontend/assets/img/galeri-1.jpg"') }} class="gallery" alt="">
             <div class="section-item-caption">
               <h5>Nama Dokumentasi</h5>
               <h6>Nama Tempat</h6>
             </div>
           </div>
           <div class="section-item-slider">
             <img src="{{ url('frontend/assets/img/galeri-2.jpeg') }}" class="gallery" alt="">
             <div class="section-item-caption">
               <h5>Nama Dokumentasi</h5>
               <h6>Nama Tempat</h6>
             </div>
           </div>
        </div>
      </div>

      <div class="btn-selengkapnya mt-4">
        <a href="#" class="btn btn-more">Lihat Gallery lainnya</a>
      </div>
    </div>
  </section>
   <!-- akhir galery --> --}}
@endsection