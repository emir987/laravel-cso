@extends('layouts.layout')

@section('title', $movie->name)

@section('body-section')

    <h1>O filmu</h1>
    <form action="{{ route('movies.update', $movie->id) }}" method="POST">
        @method('put')
        @csrf
        <div class="my-5">
            <label for="name">Naziv filma:</label>
            <input type="text" placeholder="{{ $movie->name }}" id="name" name="name" ">
                <button type=" submit" class="btn btn-primary">Sacuvaj izmjene</button>

        </div>


    </form>


@endsection
