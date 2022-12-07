@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" id="">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Jumlah Pesanan</label>
                                <div class="d-flex">
                                    <input class="form-check-input m-1" name="pesanan[]" type="checkbox" value="50000">
                                    <p>Cappuchino</p>
                                </div>
                                <div class="d-flex">
                                    <input class="form-check-input m-1" name="pesanan[]" type="checkbox" value="50000">
                                    <p>Americano</p>
                                </div>
                                <div class="d-flex">
                                    <input class="form-check-input m-1" name="pesanan[]" type="checkbox" value="50000">
                                    <p>V60</p>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Status</label>
                                <select name="status" class="form-select" id="">
                                    <option value="Member">Member</option>
                                    <option value="Non-Member">Non-Member</option>
                                </select>
                            </div>
                            <button class="btn btn-outline-dark" style="border-radius: 50px" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered border-secondary">
                            <thead class="table-dark">
                                <tr>
                                    <th colspan="2">Order</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($data)
                                <tr>
                                    <th>Nama</th>
                                    <td>{{ $data['nama'] }}</td>
                                </tr>
                                <tr>
                                    <th>Jumlah Pesanan</th>
                                    <td>{{ $data['jumlah'] }}</td>
                                </tr>
                                <tr>
                                    <th>Total Pesanan</th>
                                    <td>{{ $data['total'] }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>{{ $data['status'] }}</td>
                                </tr>
                                <tr>
                                    <th>Diskon</th>
                                    <td>{{ $data['diskon'] }}</td>
                                </tr>
                                <tr>
                                    <th>Total Pembayaran</th>
                                    <td>{{ $data['bayar'] }}</td>
                                </tr>
                                @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
