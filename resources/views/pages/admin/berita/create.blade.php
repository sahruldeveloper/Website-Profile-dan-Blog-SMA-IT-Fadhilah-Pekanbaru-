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
    Tambah Berita
@endsection




<main class="main">
     <ol class="breadcrumb">
         <li class="breadcrumb-item">Home</li>
         <li class="breadcrumb-item active">Tambah Barang</li>
     </ol>
     
     <div class="container-fluid">
         <div class="animated fadeIn">
             <div class="row">
                 <div class="col-md-12">
                     <div class="card">
                         <div class="card-header">
                             <h4 class="card-title">Barang Baru</h4>
                             @if (session('success'))
                             <div class="alert alert-success">{{ session('success') }}</div>
                             @endif
                        
                             @if (session('error'))
                             <div class="alert alert-danger">{{ session('error') }}</div>
                             @endif
                         </div>
                         <div class="card-body">
                             <form action="{{ route('berita.store') }}" method="post" enctype="multipart/form-data">
                                 @csrf
                                 <div class="form-group">
                                    <label for="id">Id Barang</label>
                                    <input type="text" class="form-control" name="id" value="{{ $id}}" readonly>
                                    <p class="text-danger">{{ $errors->first('id') }}</p>
                                </div>
                                 <div class="form-group">
                                     <label for="judul">Nama Barang</label>
                                     <input type="text" class="form-control" name="judul" required>
                                     <p class="text-danger">{{ $errors->first('judul') }}</p>
                                 </div>
                                 <div class="form-group">
                                   <label for="kategori_id">Kategori</label>
                                   <select name="kategori_id" id="" class="form-control">
                                        <option value=""> Pilih Kategori Barang</option>
                                        @forelse ($category as $result)
                                            <option value="{{ $result->id }}"> {{ $result->nama_kategori }}</option>
                                        @empty
                                            <option value="">Kategori tidak ada</option>
                                        @endforelse
                                   </select>
                                   <p class="text-danger">{{ $errors->first('category') }}</p>
                               </div>

                               <div class="form-group">
                              <label for="isi">Deskripsi</label>
                                  <textarea name="isi" class="form-control" rows="5" id="isi" ></textarea>
                                   <p class="text-danger">{{ $errors->first('isi') }}</p>
                               </div>

                               <div class="form-group">
                                   <label for="gambar">Thumbnail</label>
                                   <input type="file" class="form-control" name="gambar" required>
                                   <p class="text-danger">{{ $errors->first('judul') }}</p>
                               </div>
                                
                                 <div class="form-group">
                                     <button class="btn btn-primary btn-sm">Simpan Barang</button>
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


