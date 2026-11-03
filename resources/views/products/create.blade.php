@extends('layout')
@section('content')
<h3>Tambah Produk</h3>
<form action="{{ route('products.store') }}" method="POST">
    @include('products.form')
</form>
@endsection