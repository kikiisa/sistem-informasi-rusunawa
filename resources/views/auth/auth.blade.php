<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Login - {{ env('APP_NAME') }}</title>
   
</head>
<body>
    <section class=" dark:bg-gray-900 bg-white ">
        <div class="flex flex-col items-center justify-center px-6 mx-auto h-screen lg:py-0">
            <div class="w-100  rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <div class="image-group flex flex-row gap-3 justify-center">
                        <img class="rounded-full"
                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c6/Logo_Kementerian_Pekerjaan_Umum_Republik_Indonesia.svg/225px-Logo_Kementerian_Pekerjaan_Umum_Republik_Indonesia.svg.png"
                            width="70" alt="" srcset="">

                    </div>
                    <h1
                        class="text-xl font-bold text-center leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        SISTEM INFORMASI<br> PENGELOLAAN RUSUNAWA</h1>
                    <form class="space-y-4 md:space-y-6" method="POST" action="{{ route('login.store') }}">
                        @csrf
                        @method('POST')
                        <div>
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 @error('email') is-invalid @enderror border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required placeholder="Enter Email">
                            @error('email')
                                <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" required
                                class="bg-gray-50 @error('password') is-invalid @enderror border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                            @error('password')
                                <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror

                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="remember" aria-describedby="remember" type="checkbox"
                                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800"
                                        required>

                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="remember" class="text-gray-500 dark:text-gray-300">Ingat Saya</label>
                                </div>
                            </div>
                            <a href="#" class="text-sm font-medium text-slate-900 hover:underline">Lupa
                                password?</a>
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-slate-900 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Sign
                            in</button>

                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Belum Punya Akun ? <a href="{{ route('register') }}"
                                class="font-medium text-slate-900 hover:underline dark:text-blue-500">Daftar
                                Sekarang</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
