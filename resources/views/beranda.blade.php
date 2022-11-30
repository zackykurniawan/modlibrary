@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Daftar Buku</h1>
            @foreach ($data as $dt)
                <div class="col-3 mt-2">
                    <div class="card ms-3" style="width: 18rem; height: auto;">
                        <img src="{{ asset('storage/' . $dt->cover) }}" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">{{ $dt->judul }}</h5>
                            <h6 class="card-text">{{ $dt->pernerbit }}</h6>
                            <p class="card-text">{{ $dt->sinopsis }}</p>
                            <p></p>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('footer')
    <footer class="bg-light text-center text-lg-start">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2022 Copyright: Modern Library
        </div>
    </footer>
@endsection
