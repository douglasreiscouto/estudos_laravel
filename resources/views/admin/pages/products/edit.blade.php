@extends('admin.layouts.app')

@section('title', 'Editar produto')

@section('content')
    <h1>Editando o produto {{$product->name}}</h1>

    <form action="{{route('products.update', $product->id)}}" method="POST">
        @method('PUT')
        @include('admin.pages.products._portials.form')
    </form>
@endsection