<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Login</title>
</head>
<body>
    <div class="hidden lg:block lg:w-1/3 md:block h-screen bg-cover bg-center bg-[#607E74] p-5">
        <h1 class="text-3xl mb-7 font-extrabold">Login.</h1>
        <div class="my-10 text-white">
                <form>
                    <label for="Username" class="text-xl font-bold">Username</label><br><br>
                    <input type="text" name="username" id="username" class="w-full p-2 pl-10 text-sm text-white border rounded-lg bg-[#495E57] focus:ring-gray-400 focus:border-gray-400">
                </form>
         </div>
        
        </div>
        <div class="lg:hidden  w-full h-48 bg-cover bg-center">
        </div>
    </div>
    <div class="lg:w-2/3  p-10">
    </div>
</body>
</html>