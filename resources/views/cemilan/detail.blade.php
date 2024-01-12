@extends('layout')

@section('title', 'Detail-Cemilan')


@section('content')

    <div class="lg:flex ">
        <div class="hidden  lg:block lg:w-1/3 md:block h-screen bg-cover bg-center"
            style="background-image: url('{{ asset('images/nasgor.jpg') }}');">
        </div>
        <div class="lg:hidden w-full h-48 bg-cover bg-center mt-2"
            style="background-image: url('{{ asset('images/nasgor.jpg') }}');">
        </div>
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
                        <div class="max-w-md bg-white p-4 rounded-lg shadow mb-3">
                            <h3 class="text-xl font-semibold">Rating: {{ $items->rating }}/5</h3>
                            <p class="text-gray-600">Reviewer: {{ $items->user->name }}</p>
                            <p class="text-gray-600">Date:
                                {{ \Carbon\Carbon::parse($items->created_at)->isoFormat('D MMMM Y') }}</p>
                            <p class="mt-2">Comment: {{ $items->review }}</p>
                        </div>
                    @endforeach
                </div>
                <button id="openModal"
                    class="w-full bg-[#D9B500] hover:bg-yellow-400 text-white font-bold py-2 px-4 rounded">Tambah
                    Review</button>
            </div>


        </div>

        <div id="modal" class="fixed top-0 left-0 w-full h-full  items-center justify-center hidden">
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
                    <form action="
                {{-- {{ route('review.store') }}"  --}}
                method="POST" class="mb-4">
                        @csrf
                        <!-- Add your form fields here, for example: -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="rating">
                                Rating:
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="rating" name="rating" type="number" min="1" max="5" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="reviewer">
                                Reviewer:
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="reviewer" name="reviewer" type="text" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="comment">
                                Comment:
                            </label>
                            <textarea
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="comment" name="comment" rows="4" required></textarea>
                        </div>

                        <div class="flex items-center justify-end">
                            <button class="bg-[#D9B500] hover:bg-yellow-400 text-white font-bold py-2 px-4 rounded"
                                type="submit">
                                Tambah Review
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @endsection
