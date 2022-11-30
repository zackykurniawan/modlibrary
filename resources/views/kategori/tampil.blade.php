@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Data Kategori</h1>
            <a href="{{ url('kategori/create') }}" class="btn btn-primary">Tambah Kategori</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $dt)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $dt->nama }}</td>
                        <td>
                            <a href="{{ route('kategori.edit', $dt->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ url('delkat/'.$dt->id) }}" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
