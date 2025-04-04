@extends('layouts.app')

@section('content')

<h1 class="header-sanrio">🌸 Editar Superhéroe 🌸</h1>

<form action="{{ route('superheroes.update', $superhero->id) }}" method="POST">
    @csrf
    @method('patch')

    <div class="form-group">
        <label for="gender" class="label-sanrio">Género</label>
        <select name="gender_id" id="gender" class="input-sanrio">
            @foreach($genders as $gender)
                <option value="{{ $gender->id }}" 
                    @if ($gender->id == $superhero->gender_id)
                        selected
                    @endif    
                >{{ $gender->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="universe" class="label-sanrio">Universo</label>
        <select name="universe_id" id="universe" class="input-sanrio">
            @foreach($universes as $universe) 
                <option value="{{ $universe->id }}" 
                    @if ($universe->id == $superhero->universe_id)
                        selected
                    @endif    
                >{{ $universe->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="real_name" class="label-sanrio">Nombre Real</label>
        <input type="text" name="real_name" value="{{ $superhero->real_name }}" class="input-sanrio">
    </div>

    <div class="form-group">
        <label for="name" class="label-sanrio">Nombre</label>
        <input type="text" name="name" value="{{ $superhero->name }}" class="input-sanrio">
    </div>

    <div class="form-group">
        <label for="picture" class="label-sanrio">Imagen</label>
        <input type="text" name="picture" value="{{ $superhero->picture }}" class="input-sanrio">
    </div>

    <div class="form-group">
        <input type="submit" value="Actualizar" class="btn-sanrio">
    </div>
</form>

<br>
<a href="{{ route('gender.index') }}" class="btn-sanrio">Volver a la Lista</a>

@endsection
