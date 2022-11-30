@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Data Buku</h1>
            <a href="{{ url('buku/create') }}" class="btn btn-primary">Tambah Buku</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ISBN</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Sinopsis</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Cover</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $dt)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $dt->isbn }}</td>
                        <td>{{ $dt->judul }}</td>
                        <td>{{ $dt->sinopsis }}</td>
                        <td>{{ $dt->pernerbit }}</td>
                        <td>
                            <img src="{{ asset('storage/'.$dt->cover) }}" alt="" width="100px">
                        </td>
                        <td>{{ $dt->kategori->nama }}</td>
                        <td>{{ $dt->status }}</td>
                        <td>
                            <a href="{{ route('buku.edit', $dt->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ url('delbuk/'.$dt->id) }}" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
