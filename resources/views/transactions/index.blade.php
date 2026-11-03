@extends('layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="mb-0">Daftar Transaksi</h3>
    <a href="{{ route('transactions.create') }}" class="btn btn-primary">+ Tambah Transaksi</a>
</div>

<div class="table-responsive">
    <table class="table table-hover table-bordered align-middle">
        <thead class="table-light">
            <tr>
                <th style="width: 50px;">#</th>
                <th>No. Invoice</th>
                <th>Supplier</th>
                <th>Jenis Transaksi</th>
                <th>Subtotal</th>
                <th>Tanggal</th>
                <th style="width: 220px;" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($transactions as $transaction)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><span class="badge bg-secondary font-monospace">{{ $transaction->invoice_number }}</span></td>
                <td>{{ $transaction->supplier->supplier_name ?? '-' }}</td>
                <td>
                    <span class="badge {{ strtolower($transaction->transaction_type) == 'pembelian' ? 'bg-info text-dark' : 'bg-success' }}">
                        {{ $transaction->transaction_type }}
                    </span>
                </td>
                <td>Rp {{ number_format($transaction->subtotal, 0, ',', '.') }}</td>
                <td>{{ $transaction->created_at ? $transaction->created_at->format('d M Y H:i') : '-' }}</td>
                <td class="text-center">
                    <a href="{{ route('transactions.show', $transaction) }}" class="btn btn-sm btn-info text-white">Detail</a>
                    <a href="{{ route('transactions.edit', $transaction) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('transactions.destroy', $transaction) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center py-4 text-muted">Belum ada data transaksi.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-end mt-3">
    {{ $transactions->links() }}
</div>
@endsection

