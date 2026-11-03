@extends('layout')

@section('content')
<h3 class="mb-4">Edit Detail Transaksi</h3>

<form action="{{ route('transaction-details.update', $transactionDetail) }}" method="POST">
    @method('PUT')
    @include('transaction_details.form')
</form>
@endsection

