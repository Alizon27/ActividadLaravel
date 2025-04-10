@extends('layouts.app')

@section('content')
    <h1>Géneros de Superhéroes</h1>
    <ul>
        @foreach ($genders as $gender)
            <li>{{ $gender->name }}</li>
        @endforeach
    </ul>
@endsection
