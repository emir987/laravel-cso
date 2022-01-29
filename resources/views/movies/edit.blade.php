@extends('layouts.layout')

@section('title', 'Editovanje filma')

@section('body-section')

    <h1 class="text-primary">Izmjena filma</h1>
    <form action="{{ route('movies.update', $movie->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Izaberite naziv filma</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
                value="{{ $movie->name }}">
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Slika</label>
            <input type="file" class="form-control" name="photo" id="photo">
        </div>

        <button type="submit" class="btn btn-success">Izmjeni film</button>
    </form>

@endsection
