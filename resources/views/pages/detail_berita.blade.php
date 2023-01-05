@extends('layouts.app')

@section('title')
    Halaman Berita
@endsection

@section('content')

  <section class="detail-berita mt-5 mb-5">
       <div class="container">
          <div class="section-title-berita mt-4">
                <h5>{{ $item->judul }}</h5>   
               <div class="section-item-meta">
                    <span><i cla ss="far fa-calendar-alt"></i>{{ $item->created_at->diffForHumans() }}</span>
                    <span><i class="fas fa-map-marked-alt"></i>Pekanbaru</span>
               </div>
          </div>
               <div class=" mt-3"> 
                         <img class="section-item-thumbnail-berita" " src="{{ asset('storage/uploads/' . $item->gambar) }}"  alt="">   
               </div>
              
               <div class="section-body">
                    <p class="berita-isi">
                        {!! $item->isi !!}
                    </p>
               </div>
       </div>
  </section>
@endsection