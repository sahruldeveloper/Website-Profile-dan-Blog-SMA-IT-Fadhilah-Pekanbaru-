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
    Edit User
@endsection



<main class="main">
     <ol class="breadcrumb">
         <li class="breadcrumb-item">Home</li>
         <li class="breadcrumb-item active">Use/Edit Userr</li>
     </ol>
     
     <div class="container-fluid">
         <div class="animated fadeIn">
             <div class="row">
                 <div class="col-md-12">
                     <div class="card">
                         <div class="card-header">
                             <h4 class="card-title">Edit User</h4>
                             @if (session('success'))
                             <div class="alert alert-success">{{ session('success') }}</div>
                             @endif
                        
                             @if (session('error'))
                             <div class="alert alert-danger">{{ session('error') }}</div>
                             @endif
                         </div>
                         <div class="card-body">
                             <form action="{{ route('user.update', $user->id ) }}" method="post" >
                                 @csrf
                                 @method('PUT')
                                 <div class="form-group">
                                     <label for="name">Nama</label>
                                     <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
                                     <p class="text-danger">{{ $errors->first('name') }}</p>
                                 </div>

                               <div class="form-group">
                              <label for="email">Email</label>
                              <input type="text" class="form-control"  value="{{ $user->email }} " disabled required>
                               </div>

                           
                               <div class="form-group">
                                   <label for="password">Password</label>
                                   <input type="password" class="form-control" name="password"  >
                              </div>

                              <div class="form-group">
                                   <label for="roles">Tipe User</label>
                                        <select name="roles" id="" class="form-control">
                                             <option value="">Pilih Tipe User</option></>                                   
                                             <option value="{{ $user->roles }}" @if($user->roles == 'ADMIN') selected @endif>ADMIN</option>                               
                                             <option value="USER" @if($user->roles == "USER")selected @endif>USER</option>  
                                        </select>
                                   <p class="text-danger">{{ $errors->first('roles') }}</p>
                              </div>
                               
                                
                                 <div class="form-group">
                                     <button class="btn btn-primary btn-sm">Simpan</button>
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