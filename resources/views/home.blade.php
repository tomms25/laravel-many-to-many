@extends('layout.main-layout')

@section('content')
    
  <h1>Prodotti per categoria</h1>
  <a href="{{ route('create') }}">CREA NUOVO PRODOTTO</a>
    @foreach ($categories as $category)
      <h2 class="text-primary">Categoria: {{ $category -> name }}</h2>
      <ul>
        @foreach ($category -> products as $product)
          <li>
            <h4>Prodotto</h4>
            [{{ $product -> code }}] {{ $product -> name }} - {{ $product -> price }} &dollar;
            - {{ $product -> typology -> name }}
            - DIGITAL: 
            {{ $product -> typology -> digital ? "YES" : "NO" }}
          </li>
        @endforeach
      </ul>
    @endforeach

@endsection