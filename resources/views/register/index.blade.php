<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <title>Register</title>
</head>

<body>

    <div class="flex flex-col sm:flex-row h-screen">

        <div class="sm:w-1/2 flex items-center justify-center flex-1">
            <div class="max-w-md w-full p-6 bg-white shadow-md rounded-md">
                <h2 class="text-3xl font-bold mb-6 text-gray-800 text-center">Daftar</h2>

                <form action="/register" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-600 text-sm font-medium mb-2">Nama</label>
                        <input type="text" id="name" name="name"
                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-gray-600 text-sm font-medium mb-2">Email</label>
                        <input type="email" id="email" name="email"
                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-gray-600 text-sm font-medium mb-2">Password</label>
                        <input type="password" id="password" name="password"
                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                    </div>

                    <div class="mb-4 hidden">
                        <label for="role" class="block text-gray-600 text-sm font-medium mb-2">Role</label>
                        <select id="role" name="role"
                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                            <option value="user">User</option>
                            <!-- Add other role options as needed -->
                        </select>
                    </div>
                    <div class="flex items-center mb-4">
                        <button type="submit"
                            class="bg-[#495E57] w-full text-white px-4 py-2 rounded-md hover:bg-green-900 focus:outline-none focus:bg-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="h-5 w-5 inline-block mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                            Daftar
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="relative bg-cover md:flex items-center justify-center flex-1 text-white"
            style="background-image: url('{{ asset('images/nasgor.jpg') }}">

            <div class="absolute inset-0 bg-black opacity-50"></div>

            <div class="relative max-w-md p-10 z-10">
                <h2 class="text-4xl font-bold mb-4 text-white">Selamat Datang!</h2>
                <p class="text-lg">Mari Daftar Terlebih Dahulu</p>
                <div class=" text-white justify-center">
                    <p class="text-lg">Sudah pernah login?</p>
                    <a href="{{ route('login') }}"> <button type="submit"
                            class="bg-[#495E57] w-full text-white px-4 py-2 rounded-md hover:bg-green-900 focus:outline-none focus:bg-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="h-5 w-5 inline-block mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                            Login</button></a>
                </div>

            </div>

        </div>
    </div>

</body>

</html>
