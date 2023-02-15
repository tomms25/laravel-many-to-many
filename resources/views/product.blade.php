@extends('layout.main-layout')

@section('content')
    
    <h1>Prodotti</h1>
    <ul>
        @foreach ($products as $product)
            <li>
              [{{ $product -> code }}] {{ $product -> name }} - {{ $product -> price }} &dollar;
            - {{ $product -> typology -> name }}
            - DIGITAL: 
            {{ $product -> typology -> digital ? "YES" : "NO" }}
            </li>
        @endforeach
    </ul>

@endsection