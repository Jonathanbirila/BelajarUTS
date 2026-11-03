@extends('layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="mb-0">Daftar Produk</h3>
    <a href="{{ route('products.create') }}" class="btn btn-primary">+ Tambah Produk</a>
</div>

<div class="table-responsive">
    <table class="table table-hover table-bordered align-middle">
        <thead class="table-light">
            <tr>
                <th style="width: 50px;">#</th>
                <th>Barcode</th>
                <th>Nama Produk</th>
                <th>Supplier</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th style="width: 180px;" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($products as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><span class="badge bg-secondary font-monospace">{{ $product->barcode_number }}</span></td>
                <td class="fw-bold">{{ $product->product_name }}</td>
                <td>{{ $product->supplier->supplier_name ?? '-' }}</td>
                <td>Rp {{ number_format($product->buy_price, 0, ',', '.') }}</td>
                <td class="text-success fw-bold">Rp {{ number_format($product->sell_price, 0, ',', '.') }}</td>
                <td class="text-center">
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center py-4 text-muted">Belum ada data produk.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-end mt-3">
    {{ $products->links() }}
</div>
@endsection
