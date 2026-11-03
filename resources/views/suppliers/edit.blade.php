@extends('layout')

@section('content')
<h3 class="mb-4">Edit Supplier</h3>

<form action="{{ route('suppliers.update', $supplier) }}" method="POST">
    @method('PUT')
    @include('suppliers.form')
</form>
@endsection

