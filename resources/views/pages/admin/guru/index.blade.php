@extends('layouts.admin')

@section('title')
    Guru
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Guru</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Guru</h4>
                    <a href="{{ route('guru.create') }}" class="btn btn-primary btn-sm">Tambah Guru</a>
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
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Alamat</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Agama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>foto</th>
                                    {{-- <th>Created At</th> --}}
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($guru as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_guru }}</td>
                                    <td>{{ $item->jabatan }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->tempat_lahir }}</td>
                                    <td>{{ $item->tanggal_lahir }}</td>
                                    <td>{{ $item->agama }}</td>
                                    <td>{{ $item->jk }}</td>
                                    
                                   
                                    <td>
                                        <img src="{{ asset('storage/uploads/' . $item->foto) }}" width="100px" height="100px" alt="{{ $item->judul }}"
                                    </td>
                                    {{-- <td>{{ $item->created_at->format('d-m-Y') }}</td> --}}
                                    <td>
                                        <form action="{{ route('guru.destroy', $item->id) }}" method="post" onsubmit="return confirm('Yakin hapus data guru ?')">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('guru.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <button class="btn btn-danger btn-sm" >Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="11" class="text-center">Tidak ada data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {!! $guru->links() !!}
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
