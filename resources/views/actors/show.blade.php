@extends('layouts.layout')

@section('title', 'Glumac')

@section('body-section')
    <p>Ime i prezime: {{ $actor->first_name }} {{ $actor->last_name }}</p>
    <p>Email: {{ $actor->email }}</p>
    <p>Pol: {{ $actor->gender }}</p>
    @switch($type)
        @case(1)

        @break
        @case(2)

        @break
        @default

    @endswitch
    @unless($actor->number_oscars == 0)
        Broj osvojenih oskara:<p>{{ $actor->number_oscars }}</p>
    @endunless

@endsection
