@csrf

<div class="mb-3">
    <label class="form-label fw-bold">Nomor Invoice</label>
    <input type="text" name="invoice_number" class="form-control @error('invoice_number') is-invalid @enderror"
           placeholder="Contoh: INV-2026-001"
           value="{{ old('invoice_number', $transaction->invoice_number ?? '') }}">
    @error('invoice_number')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label fw-bold">Supplier</label>
    <select name="supplier_id" class="form-select @error('supplier_id') is-invalid @enderror">
        <option value="">-- Pilih Supplier --</option>
        @foreach ($suppliers as $supplier)
            <option value="{{ $supplier->id }}"
                {{ old('supplier_id', $transaction->supplier_id ?? '') == $supplier->id ? 'selected' : '' }}>
                {{ $supplier->supplier_name }} ({{ $supplier->phone }})
            </option>
        @endforeach
    </select>
    @error('supplier_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label fw-bold">Jenis Transaksi</label>
    <select name="transaction_type" class="form-select @error('transaction_type') is-invalid @enderror">
        <option value="">-- Pilih Jenis Transaksi --</option>
        <option value="Pembelian" {{ old('transaction_type', $transaction->transaction_type ?? '') == 'Pembelian' ? 'selected' : '' }}>Pembelian</option>
        <option value="Penjualan" {{ old('transaction_type', $transaction->transaction_type ?? '') == 'Penjualan' ? 'selected' : '' }}>Penjualan</option>
    </select>
    @error('transaction_type')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label fw-bold">Subtotal (Rp)</label>
    <input type="number" name="subtotal" class="form-control @error('subtotal') is-invalid @enderror"
           placeholder="Contoh: 150000" min="0"
           value="{{ old('subtotal', $transaction->subtotal ?? '') }}">
    @error('subtotal')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mt-4">
    <button type="submit" class="btn btn-primary px-4">Simpan</button>
    <a href="{{ route('transactions.index') }}" class="btn btn-secondary px-4">Kembali</a>
</div>

