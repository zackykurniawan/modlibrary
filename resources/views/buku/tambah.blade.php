@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">ISBN</label>
                    <input type="text" class="form-control" name="isbn">
                </div>
                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" class="form-control" name="judul">
                </div>
                <div class="mb-3">
                    <label class="form-label">Sinopsis</label>
                    <input type="text" class="form-control" name="sinopsis">
                </div>
                <div class="mb-3">
                    <label class="form-label">Penerbit</label>
                    <input type="text" class="form-control" name="pernerbit">
                </div>
                <div class="mb-3">
                    <label class="form-label">Cover</label>
                    <input class="form-control" type="file" name="cover">
                </div>
                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select class="form-select" aria-label="Default select example" name="kategori_id">
                        <option selected>Pilih Kategori</option>
                        @foreach ($kategori as $kt)
                        <option value="{{ $kt->id }}">{{ $kt->nama }}</option>
                        @endforeach
                    </select>
                </div>
                @if (Auth::user()->role == 'admin')
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select class="form-select" aria-label="Default select example" name="status">
                        <option selected>Pilih status</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak">Tidak</option>
                    </select>
                </div>
                @endif

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</div>
@endsection
