@extends('layout')

@section('title', 'Detail-Cemilan')


@section('content')

    <div class="lg:flex ">
        <div class="hidden   lg:block lg:w-1/3 md:block h-screen bg-cover bg-center" style="background-image: url('{{ asset('images/nasgor.jpg') }}');">
        </div>
        <div class="lg:hidden  w-full h-48 bg-cover bg-center" style="background-image: url('{{ asset('images/nasgor.jpg') }}');">
        </div>
        <!-- Kalimat di sebelah kanan -->
        <div class="lg:w-2/3  p-10">
            <h1 class="text-4xl font-bold mb-4">NASI GORENG</h1>
            <div class="mb-10">
                <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Bahan-bahan:</h2>
                <ul class="max-w-md space-y-1 text-black list-disc list-inside dark:text-gray-400">
                    <li>
                        At least 10 characters (and up to 100 characters)
                    </li>
                    <li>
                        At least one lowercase character
                    </li>
                    <li>
                        Inclusion of at least one special character, e.g., ! @ # ?
                    </li>
                </ul>
            </div>
            <div>
                <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Cara Membuat:</h2>
                <ul class="max-w-md space-y-1 text-black list-disc list-inside dark:text-gray-400">
                    <li>
                        At least 10 characters (and up to 100 characters)
                    </li>
                    <li>
                        At least one lowercase character
                    </li>
                    <li>
                        Inclusion of at least one special character, e.g., ! @ # ?
                    </li>
                </ul>
            </div>
           
        </div>
    </div>
   

@endsection
