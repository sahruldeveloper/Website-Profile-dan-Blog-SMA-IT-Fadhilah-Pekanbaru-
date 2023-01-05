@extends('layouts.admin')

@section('content')
@if(count($errors) > 0 )
     @foreach ($errors as $error)
     <div class="alert alert-danger" role="alert">
          {{ $error}}   
     </div>        
     @endforeach
@endif

@section('title')
    Edit Prestasi
@endsection



<main class="main">
     <ol class="breadcrumb">
         <li class="breadcrumb-item">Home</li>
         <li class="breadcrumb-item active">Edit Prestasi</li>
     </ol>
     
     <div class="container-fluid">
         <div class="animated fadeIn">
             <div class="row">
                 <div class="col-md-12">
                     <div class="card">
                         <div class="card-header">
                             <h4 class="card-title">Edit Prestasi</h4>
                             @if (session('success'))
                             <div class="alert alert-success">{{ session('success') }}</div>
                             @endif
                        
                             @if (session('error'))
                             <div class="alert alert-danger">{{ session('error') }}</div>
                             @endif
                         </div>
                         <div class="card-body">
                             <form action="{{ route('prestasi.update', $prestasi->id) }}" method="post" enctype="multipart/form-data">
                                 @csrf
                                 @method('PUT')
                                 <div class="form-group">
                                     <label for="judul">Judul</label>
                                     <input type="text" class="form-control" name="judul" value="{{ $prestasi->judul }}" required>
                                     <p class="text-danger">{{ $errors->first('judul') }}</p>
                                 </div>
                               <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control" rows="5" id="deskripsi"  >{{ $prestasi->deskripsi }}</textarea>
                                    <p class="text-danger">{{ $errors->first('deskripsi') }}</p>
                               </div>

                               <div class="form-group">
                                   <label for="foto">Foto</label>
                                   <br>
                                    <img src="{{ asset('storage/uploads/prestasi/'.$prestasi->foto) }}" width="100px" height="100px" alt="{{ $prestasi->judul }}">
                                    <hr>
                                    <input type="file" name="foto" class="form-control">
                                    <p><strong>Biarkan kosong jika tidak ingin mengganti foto</strong></p>
                                   <p class="text-danger">{{ $errors->first('foto') }}</p>
                               </div>
                                
                                 <div class="form-group">
                                     <button class="btn btn-primary btn-sm">Edit Data Prestasi</button>
                                 </div>
                             </form>
                         </div>
                     </div>
                 </div>
                 
             </div>
         </div>
     </div>
 </main>

 <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
 <script>
    CKEDITOR.replace( 'isi' );
</script>
@endsection