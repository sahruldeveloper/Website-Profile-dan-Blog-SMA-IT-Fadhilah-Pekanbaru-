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
    Edit Data Guru
@endsection



<main class="main">
     <ol class="breadcrumb">
         <li class="breadcrumb-item">Home</li>
         <li class="breadcrumb-item active">Edit Data Guru</li>
     </ol>
     
     <div class="container-fluid">
         <div class="animated fadeIn">
             <div class="row">
                 <div class="col-md-12">
                     <div class="card">
                         <div class="card-header">
                             <h4 class="card-title">Edit Data Guru</h4>
                             @if (session('success'))
                             <div class="alert alert-success">{{ session('success') }}</div>
                             @endif
                        
                             @if (session('error'))
                             <div class="alert alert-danger">{{ session('error') }}</div>
                             @endif
                         </div>
                         <div class="card-body">
                             <form action="{{ route('guru.update', $guru->id) }}" method="post" enctype="multipart/form-data">
                                 @csrf
                                 @method('PUT')
                                 <div class="form-group">
                                     <label for="nama_guru">Nama Guru</label>
                                     <input type="text" class="form-control" name="nama_guru" value="{{ $guru->nama_guru }}" required>
                                     <p class="text-danger">{{ $errors->first('nama_guru') }}</p>
                                 </div>

                                 <div class="form-group">
                                    <label for="jabatan">Jabatan</label>
                                    <input type="text" class="form-control" name="jabatan" value="{{ $guru->jabatan }}" required>
                                    <p class="text-danger">{{ $errors->first('jabatan') }}</p>
                                </div>
                                 <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" value="{{ $guru->alamat }}" required>
                                    <p class="text-danger">{{ $errors->first('alamat') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" class="form-control" name="tempat_lahir" value="{{ $guru->tempat_lahir }}" required>
                                    <p class="text-danger">{{ $errors->first('tempat_lahir') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tanggal_lahir" value="{{ $guru->tanggal_lahir }}" required>
                                    <p class="text-danger">{{ $errors->first('tanggal_lahir') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="agama">Agama</label>
                                    <select name="agama" id="" class="form-control">
                                         <option value="{{ $guru->agama}}">{{ $guru->agama}}</option>
                                             <option value="islam">islam</option>
                                             <option value="kristen">kristen</option>
                                             <option value="budha">budha</option>
                                             <option value="hindu">hindu</option>
                                        
                                    </select>
                                    <p class="text-danger">{{ $errors->first('agama') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="jk">Jenis Kelamin</label>
                                    <select name="jk" id="" class="form-control">
                                         <option value="{{ $guru->jk}}">{{ $guru->jk}}</option>
                                             <option value="Laki-Laki">Laki-Laki</option>
                                             <option value="Perempuan">Perempuan</option>
                                            
                                        
                                    </select>
                                    <p class="text-danger">{{ $errors->first('jk') }}</p>
                                </div>
                                {{-- <div class="form-group">
                                    <label for="agama">Agama</label>
                                    <input type="text" class="form-control" name="agama" value="{{ $guru->agama }}" required>
                                    <p class="text-danger">{{ $errors->first('agama') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="jk">Jenis Kelamin</label>
                                    <input type="text" class="form-control" name="jk" value="{{ $guru->jk }}" required>
                                    <p class="text-danger">{{ $errors->first('jk') }}</p>
                                </div> --}}
                
                               <div class="form-group">
                                   <label for="foto">Foto</label>
                                   <br>
                                    <img src="{{ asset('storage/uploads/'.$guru->foto) }}" width="100px" height="100px" alt="{{ $guru->nama }}">
                                    <hr>
                                    <input type="file" name="foto" class="form-control">
                                    <p><strong>Biarkan kosong jika tidak ingin mengganti foto</strong></p>
                                   <p class="text-danger">{{ $errors->first('foto') }}</p>
                               </div>
                                
                                 <div class="form-group">
                                     <button class="btn btn-primary btn-sm">Edit Data Guru</button>
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