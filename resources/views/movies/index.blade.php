@extends('layouts.layout')

@section('title', 'Filmovi')
    
@section('body-section')
    <h1>Lista filmova</h1>
    <ul>
        @foreach ($movies as $movie)
            <li>{{ $movie->name }}</li>
            @if ($loop->last)
                {{-- This is the last iteration --}}
            @endif
        @endforeach
    </ul>
@endsection 