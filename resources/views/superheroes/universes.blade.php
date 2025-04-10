@extends('layouts.app')

@section('content')
    <h1>Universos de Superhéroes</h1>
    <ul>
        @foreach ($universes as $universe)
            <li>{{ $universe->name }}</li>
        @endforeach
    </ul>
@endsection
