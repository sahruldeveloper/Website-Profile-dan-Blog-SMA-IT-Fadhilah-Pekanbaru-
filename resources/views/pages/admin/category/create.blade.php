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
    Tambah Kategori Berita
@endsection




<main class="main">
     <ol class="breadcrumb">
         <li class="breadcrumb-item">Home</li>
         <li class="breadcrumb-item active">Tambah Kategori</li>
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
                             <form action="{{ route('category.store') }}" method="post">
                                 @csrf
                                 <div class="form-group">
                                    <label for="name">Id Kategori</label>
                                    <input type="text" name="id" class="form-control" value="{{ $id }}" required>
                                    <p class="text-danger">{{ $errors->first('id') }}</p>
                                </div>
                                 <div class="form-group">
                                     <label for="name">Kategori</label>
                                     <input type="text" name="nama_kategori" class="form-control" required>
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