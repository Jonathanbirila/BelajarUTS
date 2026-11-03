@extends('layout')
@section('content')
<h3>Edit Produk</h3>
<form action="{{ route('products.update', $product) }}" method="POST">
    @method('PUT')
    @include('products.form')
</form>
@endsection