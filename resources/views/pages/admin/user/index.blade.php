@extends('layouts.admin')

@section('title')
    List User
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">User</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
               
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">List User</h4>
                            <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm">Tambah User</a>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-hover table-bordered " ">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Roles</th>
                                            {{-- <th>Created At</th> --}}
                                            {{-- <th>Aksi</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><strong>{{ $item->name }}</strong></td>
                                            <td>{{ $item->email}}</td>
                                            
                                            @if($item->roles == 'ADMIN')
                                            <td><span class="badge bg-warning" style="color:white" >{{ $item->roles}}</span></td>
                                            @else
                                            <td><span class="badge bg-secondary" style="color:white">{{ $item->roles}}</span></td>
                                            @endif
                                            {{-- <td>{{ $item->created_at->format('d-m-Y') }}</td> --}}
                                            {{-- <td>
                                                <form action="{{ route('user.destroy', $item->id) }}" method="post" onsubmit="return confirm('Yakin hapus data user ?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('user.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <button class="btn btn-danger btn-sm" >Hapus</button>
                                                </form>
                                            </td> --}}
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            {!! $users->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
