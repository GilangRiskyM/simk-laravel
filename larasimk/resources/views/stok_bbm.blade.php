@extends('layout.main')
@section('title', 'Stok BBM')
@section('content')
    <h1 class="my-3">Stok BBM</h1>
    <div class="card">
        <div class="card-body">
            <table class="table table-responsive table-bordered table-hover" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Jenis Kendaraan</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stok as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->jenis_kendaraan }}</td>
                            <td>{{ $data->stok }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
