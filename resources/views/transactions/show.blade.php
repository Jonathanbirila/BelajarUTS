@extends('layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Detail Transaksi: <span class="text-primary">{{ $transaction->invoice_number }}</span></h3>
    <div>
        <a href="{{ route('transactions.edit', $transaction) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-6">
        <table class="table table-bordered">
            <tr>
                <th class="table-light" style="width: 180px;">No. Invoice</th>
                <td><strong>{{ $transaction->invoice_number }}</strong></td>
            </tr>
            <tr>
                <th class="table-light">Supplier</th>
                <td>{{ $transaction->supplier->supplier_name ?? '-' }} ({{ $transaction->supplier->phone ?? '-' }})</td>
            </tr>
            <tr>
                <th class="table-light">Jenis Transaksi</th>
                <td>
                    <span class="badge {{ strtolower($transaction->transaction_type) == 'pembelian' ? 'bg-info text-dark' : 'bg-success' }}">
                        {{ $transaction->transaction_type }}
                    </span>
                </td>
            </tr>
        </table>
    </div>
    <div class="col-md-6">
        <table class="table table-bordered">
            <tr>
                <th class="table-light" style="width: 180px;">Subtotal</th>
                <td class="fs-5 fw-bold text-success">Rp {{ number_format($transaction->subtotal, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th class="table-light">Tanggal Dibuat</th>
                <td>{{ $transaction->created_at ? $transaction->created_at->format('d F Y, H:i') : '-' }}</td>
            </tr>
            <tr>
                <th class="table-light">Terakhir Diperbarui</th>
                <td>{{ $transaction->updated_at ? $transaction->updated_at->format('d F Y, H:i') : '-' }}</td>
            </tr>
        </table>
    </div>
</div>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Daftar Barang (Detail Transaksi)</h4>
    <a href="{{ route('transaction-details.create') }}" class="btn btn-sm btn-outline-primary">+ Tambah Item</a>
</div>

<table class="table table-bordered table-hover">
    <thead class="table-light">
        <tr>
            <th style="width: 50px;">#</th>
            <th>Nama Produk</th>
            <th>Barcode</th>
            <th class="text-center">Jumlah (Qty)</th>
            <th>Harga Satuan</th>
            <th>Total Harga</th>
            <th class="text-center" style="width: 120px;">Aksi</th>
        </tr>
    </thead>
    <tbody>
    @forelse ($transaction->transactionDetails as $detail)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $detail->product->product_name ?? 'Produk ID: ' . $detail->product_id }}</td>
            <td>{{ $detail->product->barcode_number ?? '-' }}</td>
            <td class="text-center">{{ $detail->quantity }}</td>
            <td>Rp {{ number_format($detail->price, 0, ',', '.') }}</td>
            <td>Rp {{ number_format($detail->quantity * $detail->price, 0, ',', '.') }}</td>
            <td class="text-center">
                <a href="{{ route('transaction-details.edit', $detail) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('transaction-details.destroy', $detail) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('Hapus detail item ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="7" class="text-center py-3 text-muted">Belum ada detail barang untuk transaksi ini.</td>
        </tr>
    @endforelse
    </tbody>
</table>
@endsection

