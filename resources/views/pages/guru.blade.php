@extends('layouts.app')

@section('title')
    Beranda
@endsection

@section('content')

<section id="tenaga-pendidik" class="mt-5">
     <div class="container">
       <div class="section-title">
         <h2>Tenaga Pendidik</h2>
       </div>
      
       <div class="section-body">
         <div class="row">
        
            @forelse ($guru as $item)
         <div class="col-md-3">
          <div class="section-item-slider">
            <a href=""><img class="section-item-thumbnail" style="height: 300px;" src="{{ asset('storage/uploads/' . $item->foto) }}"  alt=""></a>
            <div class="section-item-caption">
             <a href=""><h5>{{ $item->nama_guru }}</h5></a>
             <h6>{{ $item->jabatan }}</h6>
            </div>
           
            </div>
         </div>
          
            @empty
                
            @endforelse
           </div>
         </div>
   
          
         <div class="row justify-content-center mt-3 mb-5">
          {{ $guru->links() }}
         </div>

     </div>
   </section>

  
@endsection