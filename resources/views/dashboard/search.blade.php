@extends('layout')

@section('title', 'Resep-Makanan')


@section('content')
    <div class="w-full mx-12 mt-10 ">
        {{-- <h1 class="text-4xl font-bold mb-4">
            {{ $menu->title }}
        </h1> --}}
        @foreach ($menus as $items)
            <div class="w-100% ">
                <a href="#"
                    class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg"
                        src="{{ asset('images/nasgor.jpg') }}" alt="">
                    <div class="flex flex-col justify-between p-4 leading-normal">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $items->title }}
                        </h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $items->slug }}.</p>
                    </div>
                </a>
            </div>
        @endforeach

        <div class="flex flex-col mt-5 p-10">

            {{-- {{ $menus->links('pagination::tailwind') }} --}}
        </div>
    </div>

@endsection
