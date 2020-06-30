@extends('admin.layouts.app')

@section('title', 'Cadastrar Novo Produto')

@section('content')

  <h1>Cadastro de Novo Produto</h1>

  @include('admin.includes.alerts')

  <form action="{{ route('products.store') }}" method="post"
  enctype="multipart/form-data" class ="form">
    @csrf
    @include('admin.pages.products.partials.form')
  </form>
@endsection
