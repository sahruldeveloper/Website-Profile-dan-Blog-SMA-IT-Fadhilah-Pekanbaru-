@extends('layouts.admin')

@section('title')
    List Kategori
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Kategori</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
               
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">List Kategori</h4>
                            <a href="{{ route('category.create') }}" class="btn btn-primary btn-sm">Tambah Kategori</a>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kategori</th>
                                            <th>id</th>
                                            {{-- <th>Created At</th> --}}
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($category as $item)
                                        @php
                                            // dd($item)
                                        @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><strong>{{ $item->nama_kategori }}</strong></td>
                                            <td><strong>{{ $item->id}}</strong></td>
                                            {{-- <td>{{ $item->created_at->format('d-m-Y') }}</td> --}}
                                            <td>
                                                <form action="{{ route('category.destroy', $item->id) }}" method="post" onsubmit="return confirm('Yakin hapus kategori?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('category.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <button class="btn btn-danger btn-sm" >Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            {!! $category->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
