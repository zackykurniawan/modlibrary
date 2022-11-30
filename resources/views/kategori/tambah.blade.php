@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form action="{{ route('kategori.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</div>
@endsection
