@extends('admin.layouts.app')

@section('title', 'Gestão de Produtos')
@section('content')

@include('admin.includes.alerts', ['content' => 'Alerta de preços de produtos'])

  <h1>Exibindo os produtos</h1>
  <a href="{{ route('products.create') }}">Cadastrar</a>
  <br />
  <br />
  @if($teste === 123)
    É igual
  @else
      Not igual
  @endif

  @unless ($teste === '123')
    fffss
  @endunless

  @empty($teste)
    vazio
  @endempty

  @auth
    <p>Autenticado</p>
  @else
    <p>Não Autenticado</p>
  @endauth

  @guest
    <p>Não Autenticado</p>
  @endguest

  @switch($teste)
    @case(1)
      igual 1
      @break
    @case(2)
      iguale 2
      @break
    @default
      default
  @endswitch
  <hr>
  @isset($products)
    @foreach($products as $product)
    <p class="@if ($loop->last) last @endif">{{ $product }}</p>
    @endforeach
  @endisset
  <hr>
  @forelse($products as $product)
    <p>{{ $product }}</p>
    @empty
      <p>Não existe produtos cadastrados</p>
  @endforelse
@endsection

@push('styles')
  <style>
    .last { background: #CCC; }
  </style>
@endpush

@push('scripts')
  <script>
    document.body.style.background = '#efefef'
  </script>
@endpush
