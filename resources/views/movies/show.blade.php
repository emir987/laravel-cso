@extends('layouts.layout')

@section('title', $movie->name)

@section('body-section')
    <div class="d-flex flex-column">
        <h1>O filmu</h1>
        <p>Naziv: {{ $movie->name }}</p>
        <a href="{{ route('movies.edit', $movie->id) }}">Izmjeni detalje o filmu</a>
        <h6 class="text-success mt-3">{{ session('msg') }}</h6>
    </div>
    <form method="POST" action="{{ route('movies.destroy', $movie->id) }}">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-danger">Obrisi film</button>
    </form>


@endsection
