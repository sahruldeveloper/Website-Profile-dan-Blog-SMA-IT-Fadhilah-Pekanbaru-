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
    Tambah Edit Kategori Berita
@endsection



<main class="main">
     <ol class="breadcrumb">
         <li class="breadcrumb-item">Home</li>
         <li class="breadcrumb-item active">Edit Kategori</li>
     </ol>
     
     <div class="container-fluid">
         <div class="animated fadeIn">
             <div class="row">
                 <div class="col-md-4">
                     <div class="card">
                         <div class="card-header">
                             <h4 class="card-title">Kategori Baru</h4>
                             @if (session('success'))
                             <div class="alert alert-success">{{ session('success') }}</div>
                             @endif
                        
                             @if (session('error'))
                             <div class="alert alert-danger">{{ session('error') }}</div>
                             @endif
                         </div>
                         <div class="card-body">
                             <form action="{{ route('category.update', $category->id)  }}" method="post">
                                 @csrf
                                 @method('PUT')
                                 <div class="form-group">
                                     <label for="name">Kategori</label>
                                     <input type="text" name="nama_kategori" class="form-control" value="{{ $category->nama_kategori }}" required>
                                     <p class="text-danger">{{ $errors->first('nama_kategori') }}</p>
                                 </div>
                                
                                 <div class="form-group">
                                     <button class="btn btn-primary btn-sm">Simpan Kategori</button>
                                 </div>
                             </form>
                         </div>
                     </div>
                 </div>
                 
             </div>
         </div>
     </div>
 </main>
@endsection