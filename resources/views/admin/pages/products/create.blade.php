@extends('admin.layouts.app')

@section('title', 'Cadastrar Novo Produto')

@section('content')
  <h1>Cadastro de Novo Produto</h1>
  <form action="{{ route('products.store') }}" method="post">
    @csrf
    <input type="text" name="name" placeholder="Nome:">
    <input type="text" name="description" placeholder="Descrição:">
    <button type="submit">Enviar</button>
  </form>
@endsection
