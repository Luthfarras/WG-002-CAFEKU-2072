@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($data as $item)
                <div class="col-lg-4 mt-2 mb-3">
                    <div class="card text-center">
                        <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->nama }}</h5>
                            <p class="">{{ $item->harga }}</p>
                            <p class="card-text">{{ $item->keterangan }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container mt-5 mb-4">
        <footer class="text-center blockquote-footer">Cafeku @ Karisma Street 018</footer>
    </div>
@endsection
