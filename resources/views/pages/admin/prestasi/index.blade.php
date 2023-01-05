@extends('layouts.admin')

@section('title')
    Prestasi
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Prestasi</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Prestasi</h4>
                    <a href="{{ route('prestasi.create') }}" class="btn btn-primary btn-sm">Tambah Prestasi</a>
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
                                    <th>Deskripsi</th>
                                    <th>Foto</th>
                                    {{-- <th>Created At</th> --}}
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($prestasi as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><strong>{{ $item->judul }}</strong></td>
                                    <td>{!! str_limit($item->deskripsi) !!}</td>
                                 
                                    <td>
                                        <img src="{{ asset('storage/uploads/prestasi/' . $item->foto) }}" width="100px" height="100px" alt="{{ $item->nama }}">
                                    </td>
                                    {{-- <td>{{ $item->created_at->format('d-m-Y') }}</td> --}}
                                    <td>
                                        <form action="{{ route('prestasi.destroy', $item->id) }}" method="post" onsubmit="return confirm('Yakin hapus data prestasi ?')">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('prestasi.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <button class="btn btn-danger btn-sm" >Hapus</button>
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
                    {!! $prestasi->links() !!}
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
