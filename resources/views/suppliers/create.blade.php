@extends('layout')

@section('content')
<h3 class="mb-4">Tambah Supplier Baru</h3>

<form action="{{ route('suppliers.store') }}" method="POST">
    @include('suppliers.form')
</form>
@endsection

