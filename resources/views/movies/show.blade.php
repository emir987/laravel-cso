@extends('layouts.layout')

@section('title', $movie->name)

@section('body-section')
    <h1>O filmu</h1>
    <p>Naziv: {{ $movie->name }}</p>

    <form action="{{ route('movies.destroy', $movie->id) }}" method="post">
        @method('DELETE')
        @csrf

        <button type="submit" class="btn btn-danger">Obrisi film</button>
    </form>

    <a href="{{ route('movies.edit', $movie->id) }}" target="_blank" rel="noopener noreferrer"> Izmjeni film</a>
    <h4 class="text-success mt-3">Glumci iz filma</h4>
    <div class="mt-3">
        <div class="list-group">
            @foreach ($movie->actors as $actor)
                <a href="{{ route('actors.show', $actor->id) }}"
                    class="list-group-item list-group-item-action">{{ $actor->first_name }}
                    {{ $actor->last_name }}</a>
            @endforeach
        </div>

    </div>
    @if (session('msg'))
        <div class="alert alert-success mt-3" role="alert">
            {{ session('msg') }}
        </div>
    @endif
@endsection
