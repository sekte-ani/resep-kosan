<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>@yield('title')</title>
</head>

<body class="bg-gray-50">
    {{-- --- Bagian Header --- --}}
    <header>


        <nav class="bg-[#495E57] border-gray-200">
            <div class="xl:max-screen-3xl md:max-w-screen-2xl  flex flex-wrap items-center justify-between mx-5 p-4">
                <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">

                    <img src="{{ asset('images/logo.png') }}" alt="Logo Perusahaan" class="w-12 object-cover">

                    <form action="/search" method="GET">

                        <div class="relative ">
                            <input type="text" id="search-navbar"
                                class="block w-fullp-2 pl-10 text-sm text-white border rounded-lg bg-[#607E74] focus:ring-gray-400 focus:border-gray-400 w-[180px] handphone:w-[210px] md:w-[500px]    "
                                placeholder="Search..." name="search">
                            <svg class="absolute w-4 h-4 text-[#F4CE14]  top-3 left-3" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                    </form>
            </div>
            </a>

            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>

            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="flex list-none flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
                    <li>
                        <a href="{{ route('dashboard.index') }}"
                            class="{{ request()->routeIs('') ? 'active' : '' }} block py-2 px-3  text-white rounded hover:bg-gray-100  hover:text-[#D0AD06] hover:underline md:hover:bg-transparent md:hover:text-[#D0AD06]  md:p-0"
                            aria-current="page">Beranda</a>
                    </li>
                    <li>
                        <a href="{{ route('makanan.index') }}"
                            class="{{ request()->routeIs('makanan*') ? 'active' : '' }} block py-2 px-3  text-white rounded hover:bg-gray-100 hover:text-[#D0AD06] hover:underline md:hover:bg-transparent md:hover:text-[#D0AD06] md:p-0  ">Makanan</a>
                    </li>
                    <li>
                        <a href="{{ route('minuman.index') }}"
                            class="{{ request()->routeIs('minuman*') ? 'active' : '' }} block py-2 px-3  text-white rounded hover:bg-gray-100  hover:text-[#D0AD06] hover:underline md:hover:bg-transparent md:hover:text-[#D0AD06]  md:p-0 ">Minuman</a>
                    </li>
                    <li>
                        <a href="{{ route('cemilan.index') }}"
                            class="{{ request()->routeIs('cemilan*') ? 'active' : '' }} block py-2 px-3  text-white rounded  hover:underline hover:text-[#D0AD06] hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#D0AD06] md:p-0 ">Cemilan</a>
                    </li>


                    @if (Auth::user() === null)
                         <li>
                            <a href="{{ route('login') }}"
                                class="block py-2 px-3 text-white rounded hover:underline hover:text-[#D0AD06] hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#D0AD06] md:p-0">Login</a>
                        </li>
                    @elseif (Auth::user()->role === 'admin')
                        <li>
                            <a href="#"
                                class="block py-2 px-3 text-white rounded hover:underline hover:text-[#D0AD06] hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#D0AD06] md:p-0">Login</a>
                        </li>
                    @else
                        <li>
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit"
                                    class="block py-2 px-3 text-white rounded hover:underline hover:text-[#D0AD06] hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#D0AD06] md:p-0">Logout</button>
                            </form>
                        </li>
                    @endif
                </ul>
            </div>
            </div>
        </nav>


    </header>
    {{-- --- End Header --- --}}

    {{-- --- Bagian Content --- --}}
    <div>
        @yield('content')
    </div>
    {{-- --- End Content --- --}}

    {{-- --- Bagian Footer --- --}}
    <footer></footer>

    {{-- --- Footer --- --}}
    {{-- <script src="/js/script.js"></script> --}}

    <script>
        document.getElementById('openModal').addEventListener('click', function() {
            document.getElementById('modal').classList.remove('hidden');
        });

        document.getElementById('closeModal').addEventListener('click', function() {
            document.getElementById('modal').classList.add('hidden');
        });
    </script>
</body>

</html>