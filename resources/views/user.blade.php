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
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>@if ($user->role == 'admin') Admin @else Owner @endif</td>
                        <td>
                            <div class="d-flex">
                                <button type="button" class="btn btn-outline-warning m-1" style="border-radius: 50px"
                                    data-bs-toggle="modal" data-bs-target="#edit{{ $user->id }}">
                                    Edit
                                </button>
                                <form action="{{ route('user.destroy', $user->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger m-1"
                                        style="border-radius: 50px">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <div class="modal fade" id="edit{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('user.update', $user->id) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <div class="mb-3">
                                            <label for="" class="form-label">Nama</label>
                                            <input type="text" required class="form-control" name="name" id="" value="{{ $user->name }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Email</label>
                                            <input type="email" required class="form-control" name="email" id="" value="{{ $user->email }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password" id="">
                                            <p class="text-secondary">*Kosongi bila tidak ingin mengganti password.</p>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Role</label>
                                            <select name="role" class="form-select" id="">
                                                <option value="admin" @if ($user->role == 'admin') @selected($user->role == 'admin') @endif>Admin</option>
                                                <option value="owner" @if ($user->role == 'owner') @selected($user->role == 'owner') @endif>Owner</option>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Nama</label>
                            <input type="text" required class="form-control" name="name" id="">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="email" required class="form-control" name="email" id="">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Password</label>
                            <input type="password" required class="form-control" name="password" id="">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Role</label>
                            <select name="role" class="form-select" id="">
                                <option value="admin">Admin</option>
                                <option value="owner">Owner</option>
                            </select>
                        </div>
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
