@extends('admin.layouts.app')

@section('title', 'Destalhes do Produtos')
@section('content')

<h1>Produto {{ $product->name }}</h1>
<ul>
  <li><strong>Nome: </strong>{{ $product->name }}</li>
  <li><strong>Preço: </strong>{{ $product->price }}</li>
  <li><strong>Descrição: </strong>{{ $product->description }}</li>
</ul>

<a href="{{ route('products.index') }}" class="btn btn-primary">Voltar</a>
<br><br>
<form action={{ route('products.destroy', $product->id) }} method="post">
  @csrf
  @method('DELETE')
  <button type="submit" class="btn btn-danger">Deletar o produto: {{
    $product->name }}</button>

@endsection
