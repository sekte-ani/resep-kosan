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
            <div class="mb-10">
                <div>
                    {!! $menus->desc !!}
                </div>

            </div>

            <hr class="h-px my-8 bg-gray-200 border-0 ">
            <div class=" ">
                <div class="flex justify-between">
                    <h2 class="mb-2 text-lg font-semibold text-gray-900">Reviews</h2>
                    <a href="/{{ $menus->slug }}/rating">
                        <h2 class="mb-2 text-lg font-semibold text-gray-900">See More</h2>
                    </a>
                </div>

                <div class="md:flex md:space-x-4 sm:grid grid-cols-1  sm:gap-4 sm:mt-4">
                    @foreach ($rates as $items)
                        <div class="max-w-md bg-white p-4 rounded-lg shadow mb-3 w-96">
                            <h3 class="text-xl font-semibold">Rating: {{ $items->rating }}/5</h3>
                            <p class="text-gray-600">Reviewer: {{ $items->user->name }}</p>
                            <p class="text-gray-600">Date:
                                {{ \Carbon\Carbon::parse($items->created_at)->isoFormat('D MMMM Y') }}</p>
                            <p class="mt-2">Comment: {{ $items->review }}</p>
                        </div>
                    @endforeach
                </div>


                @if (Auth::user() === null)
                    <a href="{{ route('login') }}" class="underline"><button id=""
                            class="w-full bg-gray-300 hover:bg-yellow-400 hover:text-white text-gray-700 font-bold py-2 px-4 rounded">Ingin
                            Tambah Review? <label for="" class="underline text-blue-500 hover:text-white">Login</label>
                            terlebih dahulu</button></a>
                @elseif (Auth::user()->role === 'admin')
                    <a href="#" class="underline"><button id=""
                        class="w-full bg-gray-300 hover:bg-yellow-400 hover:text-white text-gray-700 font-bold py-2 px-4 rounded">Ingin
                        Tambah Review? <label for="" class="underline text-blue-500 hover:text-white">Login</label>
                        terlebih dahulu</button></a>
                @else
                    <button id="openModal"
                        class="w-full bg-[#D9B500] hover:bg-yellow-400 text-white font-bold py-2 px-4 rounded">Tambah
                        Review</button>
                @endif
            </div>


        </div>
        @auth
            {{-- ========== MODAL =============== --}}
            <div id="modal" class="fixed top-0 left-0 w-full h-full flex items-center justify-center hidden">
                <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

                <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                    <!-- Add margin if you want to see some of the overlay behind the modal-->
                    <div class="modal-content py-4 text-left px-6">
                        <!-- Title -->
                        <div class="flex justify-between items-center pb-3">
                            <p class="text-2xl font-bold">Tambah Review</p>
                            <button id="closeModal" class="modal-close p-2 rounded-md hover:bg-gray-300">&times;</button>
                        </div>

                        <!-- Form -->
                        {{-- <form action="{{ route('makanan.rate', ['title' => $title]) }}"method="POST" class="mb-4"> --}}
                        <form method="POST" class="mb-4">
                            @csrf
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="user_id">
                                    
                                    Reviewer :
                                    {{ Auth::user()->name }}
                                </label>

                                <input
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline hidden"
                                    id="user_id" name="user_id" type="number" disabled value="{{ Auth::user()->id }}">
                            </div>
                          
                            <div class="mb-3 hidden">
                                <label for="menu_id" class="form-label">Menu ID</label>
                                <input type="text" class="form-control" name='menu_id' id="menu_id"
                                    value="{{ $menus->id }}" required>

                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="rating">
                                    Rating:
                                </label>
                                <select
                                    class="block appearance-none w-full border border-gray-300 rounded py-2 px-3 leading-tight focus:outline-none focus:shadow-outline"
                                    id="rating" name="rating" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>


                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="review">
                                    Review:
                                </label>
                                <textarea
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="review" name="review" rows="4" required></textarea>
                            </div>

                            <div class="flex items-center justify-end">
                                <button class="bg-[#D9B500] hover:bg-yellow-400 text-white font-bold py-2 px-4 rounded"
                                    type="submit" name="submit">
                                    Tambah Review
                                </button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        @endauth
    @endsection
    {{-- ========== MODAL =============== --}}
