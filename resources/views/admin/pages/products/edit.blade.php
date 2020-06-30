@extends('admin.layouts.app')

@section('title', 'Editar Produto {{ $product->name }}')

@section('content')
<h1>Editar Produto {{ $product->name }}</h1>

@include('admin.includes.alerts')

<form action="{{ route('products.update', $product->id) }}" method="post">
    @method('PUT')
    @include('admin.pages.products.partials.form')
  </form>
@endsection
