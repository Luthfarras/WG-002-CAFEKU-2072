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
                    <th>Foto</th>
                    <th>Harga</th>
                    <th>Keterangan</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $menu)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $menu->nama }}</td>
                        <td><img src="{{ asset('storage/' .$menu->foto) }}" alt="" width="100px" srcset=""></td>
                        <td>{{ $menu->harga }}</td>
                        <td>{{ $menu->keterangan }}</td>
                        <td>{{ $menu->kategori->nama }}</td>
                        <td>
                            <div class="d-flex">
                                <button type="button" class="btn btn-outline-warning m-1" style="border-radius: 50px"
                                    data-bs-toggle="modal" data-bs-target="#edit{{ $menu->id }}">
                                    Edit
                                </button>
                                <form action="{{ route('menu.destroy', $menu->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger m-1"
                                        style="border-radius: 50px">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <div class="modal fade" id="edit{{ $menu->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Menu</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('menu.update', $menu->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="mb-3">
                                            <label for="" class="form-label">Nama</label>
                                            <input type="text" required class="form-control" name="nama" id="" value="{{ $menu->nama }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Foto</label>
                                            <input type="file" class="form-control" name="foto" id="">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Harga</label>
                                            <input type="number" required class="form-control" name="harga" id="" value="{{ $menu->harga }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Keterangan</label>
                                            <textarea name="keterangan" required class="form-control" id="" cols="30" rows="5">{{ $menu->keterangan }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Kategori</label>
                                            <select name="kategori_id" class="form-select" id="">
                                                @foreach ($kate as $item)
                                                <option value="{{ $item->id }}" @if ($item->id == $menu->kategori_id) @selected($item->id == $menu->kategori_id) @endif>{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" id="" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Foto</label>
                            <input type="file" class="form-control" name="foto" id="" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Harga</label>
                            <input type="number" class="form-control" name="harga" id="" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Keterangan</label>
                            <textarea name="keterangan" class="form-control" id="" cols="30" rows="5" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Kategori</label>
                            <select name="kategori_id" class="form-select" id="">
                                @foreach ($kate as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" style="border-radius: 50px"
                        data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-outline-info"
                        style="border-radius: 50px">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
