@extends('layout')

@section('title', 'Makanan-Page')


@section('content')

    <div class="md:mx-10 md:mt-10 md:grid grid-cols-4 gap-4">
        @foreach ($menus as $item)
            <div class="md:max-w-md bg-white border border-gray-200 rounded-lg shadow mx-2 relative overflow-hidden md:h-[350px] my-4">
                <a href="#" class="relative">
                    @if ($item->img == 'kosong.png')
                        <img src="{{ asset('images/food1.jpg') }}" alt="makanan" class="w-full h-full">
                        
                    @else
                        <img src="{{ asset('storage/'. $item->img) }}" alt="makanan" class="w-full h-full">
                    @endif
                    <div class="absolute inset-0 bg-black opacity-20"></div>
                </a>
                <div class="p-5 absolute bottom-0 left-0 w-full bg-gradient-to-b from-transparent to-yellow-200">
                    <a href="#">
                        <h5 class="mb-2  block text-3xl font-bold tracking-tight text-white ">{{ $item->title }}</h5>
                    </a>

                    <a href="/makanan/{{ $item->slug }}"
                        class="block  items-center w-full px-3 py-2 text-sm font-medium text-center text-white bg-[#D9B500] rounded-lg hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-blue-300">
                        Lihat Resep
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="flex flex-col mt-5 p-10">

        {{ $menus->links('pagination::tailwind') }}
    </div>

@endsection
