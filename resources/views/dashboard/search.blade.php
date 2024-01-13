@extends('layout')

@section('title', 'Resep-Makanan')


@section('content')
<div class="mx-12 mt-10 md:flex flex-wrap  sm:flex-1">
    
    @foreach ($menus as $items)
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mb-4 md:w-[300px] mx-5">
             <a href="/makanan/{{ $items->slug }}">
                @if ($items->img == 'kosong.png')
                    <img src="{{ asset('images/drink5.jpg') }}" alt="makanan" class="rounded-t-lg">
                    
                @else
                    <img src="{{ asset('storage/'. $items->img) }}" alt="makanan" class="rounded-t-lg">
                @endif
                <div class="p-5">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $items->title }}</h5>
                    
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $items->slug }}.</p>
                </div>
             </a>
        </div>
    @endforeach
</div>

@endsection
