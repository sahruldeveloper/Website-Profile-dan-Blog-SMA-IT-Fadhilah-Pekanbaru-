@extends('layouts.app')

@section('title')
    Prestasi
@endsection

@section('content')

<section id="tenaga-pendidik" class="mt-5">
     <div class="container">
       <div class="section-title">
         <h2>Prestasi</h2>
       </div>
      
       <div class="section-body">
         <div class="row mb-4"> 
          @foreach ($prestasi as $item)
            <div class="col-md-4 mb-4">
              <div class="section-item-slider">
                <a href=""><img class="section-item-thumbnail" style="height: 300px;" src="{{ asset('storage/uploads/prestasi/' . $item->foto) }}"  alt=""></a>
                <div class="section-item-caption">
                    <a href=""><h5 class="judul-prestasi">{{ $item->judul }}</h5></a>
                </div> 
              </div>
            </div>
            @endforeach
            <div class=" col-12  d-block justify-content-center mb-4">
              {{ $prestasi->links() }}
            </div>
           </div>
          </div>
        
        
      </div>
     
   </section>

  
@endsection