@extends('layouts.app')

@section('title')
    Sarana Prasarana
@endsection

@section('content')
<div class="container-fluid">
     <div class="row mt-4">
          <div class="col-sm-6 col-md-3 mb-3">
               <a href="{{ url('frontend/assets/img/logo-sekolah.png') }}" class="fancybox" data-fancybox="gallery1" >
                    <img src=" {{ url('frontend/assets/img/logo-sekolah.png') }}" width="100%" height="100%" alt="">
               </a>
          </div>
         
     </div>
</div>

  
@endsection