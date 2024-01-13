@extends('layout')

@section('title', 'Detail-Makanan')


@section('content')

    <div class="lg:flex ">
         @if ($menus->img === 'kosong.png')
         <div class="hidden  lg:block lg:w-1/3 md:block h-screen bg-cover bg-center"
            style="background-image: url('{{ asset('images/nasgor.jpg') }}');">
        </div>
        <div class="lg:hidden w-full h-48 bg-cover bg-center mt-2"
            style="background-image: url('{{ asset('images/nasgor.jpg') }}');">
        </div>
            
        @else
        <div class="hidden  lg:block lg:w-1/3 md:block h-screen bg-cover bg-center"
            style="background-image: url('{{ asset('storage/'.$menus->img) }}');">
        </div>
           <div class="lg:hidden w-full h-48 bg-cover bg-center mt-2"
                style="background-image: url('{{ asset('storage/'.$menus->img) }}');">
            </div>
        @endif
        <!-- Kalimat di sebelah kanan -->
        <div class="lg:w-2/3  p-10">
            <h1 class="text-4xl font-bold mb-4">{{ $menus->title }}</h1>
            <div class="w-full ">
                @foreach ($rates as $items)
                    <div class=" bg-white p-4 rounded-lg shadow mb-3">
                        <h3 class="text-xl font-semibold">Rating: {{ $items->rating }}/5</h3>
                        <p class="text-gray-600">Reviewer: {{ $items->user->name }}</p>
                        <p class="text-gray-600">Date:
                            {{ \Carbon\Carbon::parse($items->created_at)->isoFormat('D MMMM Y') }}</p>
                        <p class="mt-2">Comment: {{ $items->review }}</p>
                    </div>
                @endforeach
            </div>

            <div class="flex flex-col mt-5 p-10">

                {{ $rates->links('pagination::tailwind') }}
            </div>
        </div>

       

    @endsection
