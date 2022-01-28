@extends('layouts.layout')

@section('title', 'Kreiranje filma')

@section('body-section')
    <h1>Novi film</h1>
    <form method="POST" action="{{ route('movies.store') }}">
        @method("POST")
        @csrf

        <div class="my-3">
            <label for="name" class="form-label">Naziv</label>
            <input name="name" type="text" class="form-control" id="name">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Opis</label>
            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary mb-3">Kreiraj</button>
        </div>
    </form>
@endsection
