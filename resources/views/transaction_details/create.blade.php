@extends('layout')

@section('content')
<h3 class="mb-4">Tambah Detail Transaksi</h3>

<form action="{{ route('transaction-details.store') }}" method="POST">
    @include('transaction_details.form')
</form>
@endsection

