@extends('layouts.admin')

@section('title')
    Barang
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Barang</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Barang</h4>
                    <a href="{{ route('berita.create') }}" class="btn btn-primary btn-sm">Tambah Barang</a>
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
                                    <th>Creator</th>
                                    <th>Thumbnail</th>
                                    {{-- <th>Created At</th> --}}
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($berita as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><strong>{{ $item->judul }}</strong></td>
                                    <td>{{ $item->category->nama_kategori }}</td>
                                    <td>{!!  str_limit($item->isi, 50)  !!}</td>
                                    <td>{{ $item->users->name }}</td>
                                    <td>
                                        <img src="{{ asset('storage/uploads/' . $item->gambar) }}" width="100px" height="100px" alt="{{ $item->judul }}"
                                    </td>
                                    {{-- <td>{{ $item->created_at->format('d-m-Y') }}</td> --}}
                                    <td class="">
                                        <form action="{{ route('berita.destroy', $item->id) }}" method="post" onsubmit="return confirm('Yakin hapus berita?')">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('berita.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <button class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center">Tidak ada data</td>
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
