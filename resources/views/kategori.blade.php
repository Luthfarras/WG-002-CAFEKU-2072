@extends('layouts.app')

@section('content')
    <div class="container">
        <button type="button" class="btn btn-outline-primary" style="border-radius: 50px" data-bs-toggle="modal"
            data-bs-target="#add">
            Tambah +
        </button>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $kategori)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kategori->nama }}</td>
                        <td>
                            <div class="d-flex">
                                <button type="button" class="btn btn-outline-warning m-1" style="border-radius: 50px"
                                    data-bs-toggle="modal" data-bs-target="#edit{{ $kategori->id }}">
                                    Edit
                                </button>
                                <form action="{{ route('kategori.destroy', $kategori->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger m-1"
                                        style="border-radius: 50px">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <div class="modal fade" id="edit{{ $kategori->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Kategori</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('kategori.update', $kategori->id) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <label for="" class="form-label">Nama</label>
                                        <input type="text" required class="form-control" name="nama" id="" value="{{ $kategori->nama }}">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" style="border-radius: 50px"
                                        data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-outline-success"
                                        style="border-radius: 50px">Ubah</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        @csrf
                        <label for="" class="form-label">Nama</label>
                        <input type="text" required class="form-control" name="nama" id="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" style="border-radius: 50px"
                        data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-outline-info" style="border-radius: 50px">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
