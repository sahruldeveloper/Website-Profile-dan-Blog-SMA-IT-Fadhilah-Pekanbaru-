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
    Tambah Prestasi
@endsection



<main class="main">
     <ol class="breadcrumb">
         <li class="breadcrumb-item">Home</li>
         <li class="breadcrumb-item active">Tambah Prestasi</li>
     </ol>
     
     <div class="container-fluid">
         <div class="animated fadeIn">
             <div class="row">
                 <div class="col-md-12">
                     <div class="card">
                         <div class="card-header">
                             <h4 class="card-title">Prestasi Baru</h4>
                             @if (session('success'))
                             <div class="alert alert-success">{{ session('success') }}</div>
                             @endif
                        
                             @if (session('error'))
                             <div class="alert alert-danger">{{ session('error') }}</div>
                             @endif
                         </div>
                         <div class="card-body">
                             <form action="{{ route('prestasi.store') }}" method="post" enctype="multipart/form-data">
                                 @csrf
                                 <div class="form-group">
                                    <label for="id">Id Prestasi</label>
                                    <input type="text" class="form-control" name="id" value="{{ $id }}" required>
                                    <p class="text-danger">{{ $errors->first('id') }}</p>
                                </div>
                                 <div class="form-group">
                                     <label for="judul">Judul</label>
                                     <input type="text" class="form-control" name="judul" required>
                                     <p class="text-danger">{{ $errors->first('judul') }}</p>
                                 </div>
                                

                               <div class="form-group">
                              <label for="deskripsi">Deskripsi</label>
                                  <textarea name="deskripsi" class="form-control" rows="5" id="deskripsi" ></textarea>
                                   <p class="text-danger">{{ $errors->first('isi') }}</p>
                               </div>

                               <div class="form-group">
                                   <label for="foto">Foto</label>
                                   <input type="file" class="form-control" name="foto" required>
                                   <p class="text-danger">{{ $errors->first('foto') }}</p>
                               </div>
                                
                                 <div class="form-group">
                                     <button class="btn btn-primary btn-sm">Simpan Data Prestasi</button>
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