@extends('layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="mb-0">Detail Item Transaksi</h3>
    <div>
        <a href="{{ route('transaction-details.edit', $transactionDetail) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('transaction-details.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-bordered mb-0">
            <tr>
                <th class="table-light" style="width: 200px;">No. Invoice</th>
                <td>
                    <a href="{{ route('transactions.show', $transactionDetail->transaction_id) }}" class="fw-bold">
                        {{ $transactionDetail->transaction->invoice_number ?? '-' }}
                    </a>
                </td>
            </tr>
            <tr>
                <th class="table-light">Produk</th>
                <td>{{ $transactionDetail->product->product_name ?? '-' }} (Barcode: {{ $transactionDetail->product->barcode_number ?? '-' }})</td>
            </tr>
            <tr>
                <th class="table-light">Jumlah (Quantity)</th>
                <td><span class="badge bg-primary fs-6">{{ $transactionDetail->quantity }}</span></td>
            </tr>
            <tr>
                <th class="table-light">Harga Satuan</th>
                <td>Rp {{ number_format($transactionDetail->price, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th class="table-light">Total Harga</th>
                <td class="fs-5 fw-bold text-success">
                    Rp {{ number_format($transactionDetail->quantity * $transactionDetail->price, 0, ',', '.') }}
                </td>
            </tr>
            <tr>
                <th class="table-light">Waktu Dicatat</th>
                <td>{{ $transactionDetail->created_at ? $transactionDetail->created_at->format('d F Y, H:i') : '-' }}</td>
            </tr>
        </table>
    </div>
</div>
@endsection

