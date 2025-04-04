@extends('layouts.app')

@section('content')

<h1 class="header-sanrio">🌸 Tarjeta de Superhéroe 🌸</h1>

<div class="superhero-card">
    <h2 class="name-sanrio">{{ $superhero->name }}</h2>
    
    <p class="label-sanrio">Nombre Real:</p>
    <p>{{ $superhero->real_name }}</p>

    <p class="label-sanrio">Género:</p>
    <p>{{ $superhero->gender->name }}</p>

    <p class="label-sanrio">Universo:</p>
    <p>{{ $superhero->universe->name }}</p>

    <p class="label-sanrio">Imagen:</p>
    <p>{{ $superhero->picture }}</p>
</div>

<div class="back-button">
    <a href="{{ route('superheroes.index') }}" class="btn-sanrio">Volver a la Lista</a>
</div>

@endsection
