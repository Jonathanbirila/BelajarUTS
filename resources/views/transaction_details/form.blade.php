@csrf

<div class="mb-3">
    <label class="form-label fw-bold">Pilih Transaksi (No. Invoice)</label>
    <select name="transaction_id" class="form-select @error('transaction_id') is-invalid @enderror">
        <option value="">-- Pilih Transaksi --</option>
        @foreach ($transactions as $t)
            <option value="{{ $t->id }}"
                {{ old('transaction_id', $transactionDetail->transaction_id ?? '') == $t->id ? 'selected' : '' }}>
                {{ $t->invoice_number }} - {{ $t->supplier->supplier_name ?? 'Tanpa Supplier' }} ({{ $t->transaction_type }})
            </option>
        @endforeach
    </select>
    @error('transaction_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label fw-bold">Pilih Produk</label>
    <select name="product_id" id="product_id" class="form-select @error('product_id') is-invalid @enderror">
        <option value="">-- Pilih Produk --</option>
        @foreach ($products as $p)
            <option value="{{ $p->id }}" data-sell-price="{{ $p->sell_price }}" data-buy-price="{{ $p->buy_price }}"
                {{ old('product_id', $transactionDetail->product_id ?? '') == $p->id ? 'selected' : '' }}>
                {{ $p->product_name }} (Barcode: {{ $p->barcode_number }}) - Jual: Rp {{ number_format($p->sell_price, 0, ',', '.') }}
            </option>
        @endforeach
    </select>
    @error('product_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label fw-bold">Jumlah (Qty)</label>
        <input type="number" name="quantity" id="quantity" class="form-control @error('quantity') is-invalid @enderror"
               placeholder="Contoh: 2" min="1"
               value="{{ old('quantity', $transactionDetail->quantity ?? 1) }}">
        @error('quantity')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label fw-bold">Harga Satuan (Rp)</label>
        <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror"
               placeholder="Contoh: 15000" min="0"
               value="{{ old('price', $transactionDetail->price ?? '') }}">
        @error('price')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="mt-4">
    <button type="submit" class="btn btn-primary px-4">Simpan</button>
    <a href="{{ route('transaction-details.index') }}" class="btn btn-secondary px-4">Kembali</a>
</div>

