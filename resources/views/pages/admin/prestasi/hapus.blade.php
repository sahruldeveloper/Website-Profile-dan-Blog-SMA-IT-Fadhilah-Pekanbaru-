@extends('layouts.admin')

@section('title')
    <title>Berita yang sudah dihapus</title>
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Berita yang sudah dihapus</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Berita yang sudah dihapus</h4>
                    
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
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>isi</th>
                                    <th>Thumbnail</th>
                                    <th>Created At</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($berita as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><strong>{{ $item->judul }}</strong></td>
                                    <td>{{ $item->category->name }}</td>
                                    <td>{{ $item->isi }}</td>
                                    <td>
                                        <img src="{{ asset('storage/uploads/' . $item->gambar) }}" width="100px" height="100px" alt="{{ $item->judul }}"
                                    </td>
                                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                    <td>
                                        <form action="{{ route('berita_restore_hapus', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('berita_restore', $item->id) }}" class="btn btn-warning btn-sm">Restore</a>
                                            <button class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {!! $berita->links() !!}
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
