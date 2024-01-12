@extends('layout')

@section('title', 'Cemilan-Page')


@section('content')

<div class="md:mx-10 md:mt-10 md:grid grid-cols-3 gap-4">
    @foreach ($menus as $item)
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow mx-2 relative overflow-hidden mb-4 h-[350px]">
            <a href="#" class="relative">
                <img src="{{ asset('images/snackbg.jpg') }}" alt="Logo Perusahaan" class="w-full h-auto">
                <div class="absolute inset-0 bg-black opacity-20"></div>
            </a>
            <div class="p-5 absolute bottom-0 left-0 w-full bg-gradient-to-b from-transparent to-yellow-200">
                <a href="#">
                    <h5 class="mb-2  block text-3xl font-bold tracking-tight text-white ">{{ $item->title }}</h5>
                </a>

                <a href="//{{ $item->slug }}"
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
