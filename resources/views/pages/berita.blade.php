@extends('layouts.app')

@section('title')
    Beranda
@endsection

@section('content')
<section id="berita-lengkap" class="mt-5">
     <div class="container">
        <div class="section-title">
          <h2>Berita Terbaru</h2>
        </div>
        @forelse ($data as $berita)
        <div class="section-item">
            <div class="row">
              <div class="col-md-6 ">
                <img class="section-item-thumbnail-berita-lengkap"  src="{{ asset('storage/uploads/' . $berita->gambar) }}"  alt="">
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
                  {!!  str_limit($berita->isi, 100)  !!}
                  </div>
                
              </div>
            </div>        
        </div>
        @empty
        @endforelse
     </div>
     <div class="row justify-content-center mb-4">
      {!! $data->links()!!}
     </div>
    
   </section>
   
  <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
@endsection