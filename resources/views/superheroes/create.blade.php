@extends('layouts.app')

@section('content')

<h1 class="header-sanrio">🌸 Crear Superhéroe 🌸</h1>

<form action="{{ route('superheroes.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="gender" class="label-sanrio">Género</label>
        <select name="gender_id" id="gender" class="input-sanrio">
            @foreach($genders as $gender)
                <option value="{{ $gender->id }}">{{ $gender->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="universe" class="label-sanrio">Universo</label>
        <select name="universe_id" id="universe" class="input-sanrio">
            @foreach($universes as $universe)
                <option value="{{ $universe->id }}">{{ $universe->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="real_name" class="label-sanrio">Nombre Real</label>
        <input type="text" name="real_name" class="input-sanrio">
    </div>

    <div class="form-group">
        <label for="name" class="label-sanrio">Nombre</label>
        <input type="text" name="name" class="input-sanrio">
    </div>

    <div class="form-group">
        <label for="picture" class="label-sanrio">Imagen</label>
        <input type="text" name="picture" class="input-sanrio">
    </div>

    <div class="form-group">
        <input type="submit" value="Crear" class="btn-sanrio">
    </div>
</form>

<br>
<a href="{{ route('superheroes.index') }}" class="btn-sanrio">Volver a la Lista</a>

@endsection
