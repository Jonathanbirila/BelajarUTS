@extends('layout')

@section('content')
<h3 class="mb-4">Tambah Transaksi Baru</h3>

<form action="{{ route('transactions.store') }}" method="POST">
    @include('transactions.form')
</form>
@endsection

