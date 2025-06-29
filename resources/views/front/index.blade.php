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
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>SIPR</title>
</head>
<body>
    <x-navbar />
    <section class=" dark:bg-gray-900 bg-white mt-12 lg:w-1/2 mx-auto">
        <div class="flex flex-col justify-center font-light ">
            <h1 class="text-4xl font-bold text-center leading-tight tracking-tight bg-gradient-to-r from-yellow-600 via-green-500 to-indigo-600  text-transparent bg-clip-text">Selamat Datang Di SIPR</h1>
            <span class="text-center">Temukan Informasi Kamar dan Penginapan Anda Disini.</span>
        </div>
        <form class="w-100 mx-auto mt-8" method="GET">
            <label for="default-search"
                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" 
                    name="search"
                    id="default-search"
                    class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Cari Nomor Kamar example : 101" required />
                <button type="submit"
                    class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </form>
        @if ($data->isEmpty())
            <div class="">
                <h1 class="text-center text-xl mt-4">Data Tidak Ditemukan</h1>
            </div>
        @else   
            <div class="grid lg:grid-cols-2 grid-cols-1 gap-4 mt-4 p-3 justify-center items-center">
                @foreach ($data as $item)
                    <x-card :item="$item"/>
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
