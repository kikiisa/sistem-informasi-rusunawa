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

    <link
        href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>SIPR</title>
    <style>
        body {
            font-family: "Outfit", sans-serif;
            font-optical-sizing: auto;
            font-weight: 400;
            font-style: normal;
        }
    </style>
</head>

<body>
    <x-navbar />
    <section class=" dark:bg-gray-900 bg-white mt-12 lg:w-1/2 mx-auto">
        <div class="flex flex-col justify-center items-center text-center font-light space-y-3">
            <h1
                class="text-4xl md:text-5xl font-bold leading-tight tracking-tight bg-gradient-to-r from-indigo-600 via-green-500 to-yellow-600 bg-clip-text text-transparent drop-shadow-sm">
                Selamat Datang di SIPR
            </h1>
            <span class="text-gray-600 text-base md:text-lg">
                Temukan informasi kamar & penginapan terbaik dengan mudah.
            </span>
        </div>

        <form class="w-full max-w-xl mx-auto mt-10" method="GET">
            <label for="default-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" name="search" id="default-search"
                    class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-200 rounded-xl bg-gray-50 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm transition"
                    placeholder="Cari nomor kamar, contoh: 101, 202..." required />
                <button type="submit"
                    class="absolute end-2.5 bottom-2.5 bg-gradient-to-r from-indigo-600 to-blue-600 hover:from-indigo-700 hover:to-blue-700 text-white font-semibold rounded-lg text-sm px-5 py-2 shadow-md transition">
                    Cari
                </button>
            </div>
        </form>

        @if ($data->isEmpty())
            <div class="">
                <h1 class="text-center text-xl mt-4">Data Tidak Ditemukan</h1>
            </div>
        @else
            <div class="grid lg:grid-cols-2 grid-cols-1 gap-4 mt-4 p-3 justify-center items-center">
                @foreach ($data as $item)
                    <x-card :item="$item" />
                @endforeach
            </div>
        @endif

        @if ($data->hasPages())
            <div class="flex justify-center mt-6 mb-8">
                <nav aria-label="Page navigation example">
                    <ul class="inline-flex -space-x-px text-base h-10">
                        {{-- Previous --}}
                        @if ($data->onFirstPage())
                            <li>
                                <span
                                    class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-400 bg-white border border-e-0 border-gray-300 rounded-s-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-500">Previous</span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $data->previousPageUrl() }}"
                                    class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                            </li>
                        @endif

                        {{-- Page numbers --}}
                        @foreach ($data->links()->elements[0] as $page => $url)
                            @if ($page == $data->currentPage())
                                <li>
                                    <span aria-current="page"
                                        class="flex items-center justify-center px-4 h-10 text-blue-600 border border-gray-300 bg-blue-50 dark:border-gray-700 dark:bg-gray-700 dark:text-white">{{ $page }}</span>
                                </li>
                            @else
                                <li>
                                    <a href="{{ $url }}"
                                        class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach

                        {{-- Next --}}
                        @if ($data->hasMorePages())
                            <li>
                                <a href="{{ $data->nextPageUrl() }}"
                                    class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                            </li>
                        @else
                            <li>
                                <span
                                    class="flex items-center justify-center px-4 h-10 leading-tight text-gray-400 bg-white border border-gray-300 rounded-e-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-500">Next</span>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        @endif
    </section>
</body>

</html>
