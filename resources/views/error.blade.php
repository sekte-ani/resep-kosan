@extends('layout')

@section('title', 'Makanan-Page')


@section('content')

    @if (session('error'))
        <h1>{{ session('error') }}</h1>
    @endif

@endsection
