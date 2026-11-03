@extends('layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="mb-0">Detail Supplier: <span class="text-primary">{{ $supplier->supplier_name }}</span></h3>
    <div>
        <a href="{{ route('suppliers.edit', $supplier) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>

<div class="card mb-4">
    <div class="card-body">
        <table class="table table-bordered mb-0">
            <tr>
                <th class="table-light" style="width: 200px;">Nama Supplier</th>
                <td><strong>{{ $supplier->supplier_name }}</strong></td>
            </tr>
            <tr>
                <th class="table-light">Nomor Telepon</th>
                <td>{{ $supplier->phone }}</td>
            </tr>
            <tr>
                <th class="table-light">Email</th>
                <td>{{ $supplier->email }}</td>
            </tr>
            <tr>
                <th class="table-light">Jumlah Produk</th>
                <td>{{ $supplier->products->count() }} produk terdaftar</td>
            </tr>
        </table>
    </div>
</div>
@endsection

