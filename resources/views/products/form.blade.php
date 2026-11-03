@csrf

<div class="mb-3">
    <label class="form-label fw-bold">Nomor Barcode</label>
    <input type="number" name="barcode_number" class="form-control @error('barcode_number') is-invalid @enderror"
           placeholder="Contoh: 899123456789"
           value="{{ old('barcode_number', $product->barcode_number ?? '') }}">
    @error('barcode_number')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label fw-bold">Nama Produk</label>
    <input type="text" name="product_name" class="form-control @error('product_name') is-invalid @enderror"
           placeholder="Contoh: Kopi Kapal Api 65g"
           value="{{ old('product_name', $product->product_name ?? '') }}">
    @error('product_name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label fw-bold">Supplier</label>
    <select name="supplier_id" class="form-select @error('supplier_id') is-invalid @enderror">
        <option value="">-- Pilih Supplier --</option>
        @foreach ($suppliers as $supplier)
            <option value="{{ $supplier->id }}"
                {{ old('supplier_id', $product->supplier_id ?? '') == $supplier->id ? 'selected' : '' }}>
                {{ $supplier->supplier_name }}
            </option>
        @endforeach
    </select>
    @error('supplier_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label fw-bold">Harga Beli (Rp)</label>
        <input type="number" name="buy_price" class="form-control @error('buy_price') is-invalid @enderror"
               placeholder="Contoh: 10000" min="0"
               value="{{ old('buy_price', $product->buy_price ?? '') }}">
        @error('buy_price')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label fw-bold">Harga Jual (Rp)</label>
        <input type="number" name="sell_price" class="form-control @error('sell_price') is-invalid @enderror"
               placeholder="Contoh: 13000" min="0"
               value="{{ old('sell_price', $product->sell_price ?? '') }}">
        @error('sell_price')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="mt-4">
    <button type="submit" class="btn btn-primary px-4">Simpan</button>
    <a href="{{ route('products.index') }}" class="btn btn-secondary px-4">Kembali</a>
</div>
