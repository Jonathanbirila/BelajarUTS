@extends('layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="mb-0">Daftar Detail Transaksi</h3>
    <a href="{{ route('transaction-details.create') }}" class="btn btn-primary">+ Tambah Detail Transaksi</a>
</div>

<div class="table-responsive">
    <table class="table table-hover table-bordered align-middle">
        <thead class="table-light">
            <tr>
                <th style="width: 50px;">#</th>
                <th>No. Invoice</th>
                <th>Produk</th>
                <th class="text-center">Jumlah (Qty)</th>
                <th>Harga Satuan</th>
                <th>Total</th>
                <th style="width: 180px;" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($transactionDetails as $detail)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <a href="{{ route('transactions.show', $detail->transaction_id) }}" class="fw-bold text-decoration-none">
                        {{ $detail->transaction->invoice_number ?? 'Trx #' . $detail->transaction_id }}
                    </a>
                </td>
                <td>{{ $detail->product->product_name ?? 'Produk #' . $detail->product_id }}</td>
                <td class="text-center fw-bold">{{ $detail->quantity }}</td>
                <td>Rp {{ number_format($detail->price, 0, ',', '.') }}</td>
                <td class="text-success fw-bold">Rp {{ number_format($detail->quantity * $detail->price, 0, ',', '.') }}</td>
                <td class="text-center">
                    <a href="{{ route('transaction-details.show', $detail) }}" class="btn btn-sm btn-info text-white">Lihat</a>
                    <a href="{{ route('transaction-details.edit', $detail) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('transaction-details.destroy', $detail) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center py-4 text-muted">Belum ada detail transaksi.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-end mt-3">
    {{ $transactionDetails->links() }}
</div>
@endsection

