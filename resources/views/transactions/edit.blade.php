@extends('layout')

@section('content')
<h3 class="mb-4">Edit Transaksi</h3>

<form action="{{ route('transactions.update', $transaction) }}" method="POST">
    @method('PUT')
    @include('transactions.form')
</form>
@endsection

