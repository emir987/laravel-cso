@extends('layouts.layout')

@section('title', 'Filmovi')

@section('body-section')
    <h1>Lista filmova</h1>
    <ul>
        @foreach ($movies as $movie)
            <a href="{{ route('movies.show', $movie->id) }}">
                <li>{{ $movie->name }}</li>
            </a>

            {{-- @if ($loop->last)

            @endif --}}
        @endforeach
        <a href="{{ route('movies.create') }}">
            <li>Dodaj novi film</li>
        </a>
        @if (session('msg'))
            <div class="alert alert-success mt-3" role="alert">
                {{ session('msg') }}
            </div>
        @endif

    </ul>
@endsection
