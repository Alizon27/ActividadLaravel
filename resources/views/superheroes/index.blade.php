@extends('layouts.app')

@section('content')

    <h1 class="header-sanrio">🌸 Lista de Superhéroes 🌸</h1>

    <hr> 

    <a href="{{ route('superheroes.create') }}" class="btn-sanrio">➕ Crear Superhéroe</a>
    <a href="{{ route('gender.create') }}" class="btn-sanrio">➕ Crear Género</a>
    <a href="{{ route('gender.index') }}" class="btn-sanrio">✏️ Editar Géneros</a>
    <a href="{{ route('universes.index') }}" class="btn-sanrio">✏️ Editar Universos</a>

    <hr> 

    <table class="table-sanrio">
        <thead>
            <tr>
                <th>ID</th>
                <th>Universo</th>
                <th>Género</th>
                <th>Nombre</th>
                <th>Nombre Real</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach($superheroes as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->universe->name}}</td>
                <td>{{$item->gender->name}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->real_name}}</td>
                <td><img src="{{$item->picture}}" alt="{{$item->name}}" width="100"></td>
                <td>
                    <a href="{{ route('gender.edit', $item->gender_id) }}" class="btn-sanrio">✏️ Editar</a>
                    <a href="{{ route('gender.show', $item->gender_id) }}" class="btn-sanrio">👀 Ver</a>
                    <br>
                    <form action="{{ route('superheroes.destroy', $item->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="❌ Eliminar" onclick="return confirm('¿Estás segur@? No hay vuelta atrás')" class="btn-sanrio">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection
