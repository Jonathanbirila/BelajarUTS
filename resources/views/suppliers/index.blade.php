@extends('layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="mb-0">Daftar Supplier</h3>
    <a href="{{ route('suppliers.create') }}" class="btn btn-primary">+ Tambah Supplier</a>
</div>

<div class="table-responsive">
    <table class="table table-hover table-bordered align-middle">
        <thead class="table-light">
            <tr>
                <th style="width: 50px;">#</th>
                <th>Nama Supplier</th>
                <th>No. Telepon</th>
                <th>Email</th>
                <th style="width: 180px;" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($suppliers as $supplier)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td class="fw-bold">{{ $supplier->supplier_name }}</td>
                <td>{{ $supplier->phone }}</td>
                <td>{{ $supplier->email }}</td>
                <td class="text-center">
                    <a href="{{ route('suppliers.show', $supplier) }}" class="btn btn-sm btn-info text-white">Lihat</a>
                    <a href="{{ route('suppliers.edit', $supplier) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('suppliers.destroy', $supplier) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus supplier ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center py-4 text-muted">Belum ada data supplier.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-end mt-3">
    {{ $suppliers->links() }}
</div>
@endsection

