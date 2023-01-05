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
    Edit Berita
@endsection




<main class="main">
     <ol class="breadcrumb">
         <li class="breadcrumb-item">Home</li>
         <li class="breadcrumb-item active">Edit Berita</li>
     </ol>
     
     <div class="container-fluid">
         <div class="animated fadeIn">
             <div class="row">
                 <div class="col-md-12">
                     <div class="card">
                         <div class="card-header">
                             <h4 class="card-title">Edit Berita</h4>
                             @if (session('success'))
                             <div class="alert alert-success">{{ session('success') }}</div>
                             @endif
                        
                             @if (session('error'))
                             <div class="alert alert-danger">{{ session('error') }}</div>
                             @endif
                         </div>
                         <div class="card-body">
                             <form action="{{ route('berita.update', $berita->id) }}" method="post" enctype="multipart/form-data">
                                 @csrf
                                 @method('PUT')
                                 <div class="form-group">
                                     <label for="judul">Judul</label>
                                     <input type="text" class="form-control" name="judul" value="{{ $berita->judul }}" required>
                                     <p class="text-danger">{{ $errors->first('judul') }}</p>
                                 </div>
                                 <div class="form-group">
                                   <label for="category">Kategori</label>
                                   <select name="kategori_id" id="" class="form-control">
                                        <option value=""> Pilih Kategori Berita</option>
                                        @forelse ($category as $result)
                                            <option value="{{ $result->id }}" {{ $berita->kategori_id  == $result->id ? 'selected' : ''}}> {{ $result->nama_kategori }}</option>
                                        @empty
                                            <option value="">Kategori tidak ada</option>
                                        @endforelse
                                   </select>
                                   <p class="text-danger">{{ $errors->first('category') }}</p>
                               </div>

                               <div class="form-group">
                              <label for="isi">Isi</label>
                                  <textarea name="isi" class="form-control" rows="5" id="isi"  >{{ $berita->isi }}</textarea>
                                   <p class="text-danger">{{ $errors->first('isi') }}</p>
                               </div>

                               <div class="form-group">
                                   <label for="gambar">Thumbnail</label>
                                   <br>
                                    <img src="{{ asset('storage/uploads/'.$berita->gambar) }}" width="100px" height="100px" alt="{{ $berita->judul }}">
                                    <hr>
                                    <input type="file" name="gambar" class="form-control">
                                    <p><strong>Biarkan kosong jika tidak ingin mengganti gambar</strong></p>
                                   <p class="text-danger">{{ $errors->first('judul') }}</p>
                               </div>
                                
                                 <div class="form-group">
                                     <button class="btn btn-primary btn-sm">Edit Berita</button>
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