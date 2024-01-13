@extends('layout')

@section('title', 'Resep-Makanan')


@section('content')
<div class="mx-12 mt-10 md:flex flex-wrap  sm:flex-1">
    
    @foreach ($menus as $items)
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mb-4 md:w-[300px] mx-5">
            <a href="#">
                <img class="rounded-t-lg" src="{{ asset('images/nasgor.jpg') }}" alt="">
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $items->title }}</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $items->slug }}.</p>
            </div>
        </div>
    @endforeach
</div>

@endsection
