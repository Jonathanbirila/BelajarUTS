@csrf

<div class="mb-3">
    <label class="form-label fw-bold">Nama Supplier</label>
    <input type="text" name="supplier_name" class="form-control @error('supplier_name') is-invalid @enderror"
           placeholder="Contoh: PT Sumber Pangan"
           value="{{ old('supplier_name', $supplier->supplier_name ?? '') }}">
    @error('supplier_name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label fw-bold">Nomor Telepon</label>
    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
           placeholder="Contoh: 08123456789"
           value="{{ old('phone', $supplier->phone ?? '') }}">
    @error('phone')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label fw-bold">Email</label>
    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
           placeholder="Contoh: supplier@example.com"
           value="{{ old('email', $supplier->email ?? '') }}">
    @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mt-4">
    <button type="submit" class="btn btn-primary px-4">Simpan</button>
    <a href="{{ route('suppliers.index') }}" class="btn btn-secondary px-4">Kembali</a>
</div>

