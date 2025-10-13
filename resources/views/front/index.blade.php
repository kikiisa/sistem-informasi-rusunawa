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
  <header class="bg-white shadow-sm sticky top-0 z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 flex justify-between items-center">
            <div class="text-2xl font-bold text-indigo-600">SIPR</div>
            <nav class="hidden sm:flex space-x-4">
                <a href="#" class="text-gray-600 hover:text-indigo-600 transition">Beranda</a>
                <a href="#" class="text-gray-600 hover:text-indigo-600 transition">Tentang</a>
                <a href="#" class="text-white bg-indigo-600 px-4 py-2 rounded-lg text-sm font-medium hover:bg-indigo-700 transition shadow-md">Login</a>
            </nav>
            <button class="sm:hidden text-gray-600 hover:text-indigo-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
        </div>
    </header>
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Section 1: Hero & Search (Remake of original header/search) -->
        <section class="mt-16 mb-12 py-12 text-center">
            <div class="space-y-4 max-w-4xl mx-auto">
                <h1 class="text-5xl md:text-6xl font-extrabold leading-tight tracking-tight">
                    <span class="text-gradient">Selamat Datang di SIPR</span>
                </h1>
                <p class="text-xl text-gray-600 font-light">
                    Temukan informasi kamar & penginapan terbaik dengan mudah dan real-time.
                </p>
            </div>

            <!-- Search Form -->
            <form class="w-full max-w-xl mx-auto mt-10 shadow-xl rounded-2xl bg-white p-2" method="GET">
                <label for="default-search" class="sr-only">Cari</label>
                <div class="relative flex items-center">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" name="search" id="default-search"
                        class="block w-full p-3 ps-10 text-base text-gray-900 border-0 focus:ring-0 rounded-l-xl bg-white"
                        placeholder="Cari nomor kamar, contoh: 101, 202..." required />
                    <button type="submit"
                        class="bg-gradient-to-r from-indigo-600 to-blue-500 hover:from-indigo-700 hover:to-blue-600 text-white font-semibold rounded-xl text-sm px-6 py-3 transition duration-300 transform hover:scale-[1.02] shadow-lg">
                        Cari
                    </button>
                </div>
            </form>
        </section>
        
        <!-- Section 2: Statistics (New Section) -->
        <section class="mt-16 mb-20">
            <div class="max-w-6xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-6">
                <!-- Stat Card 1 -->
                <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100 text-center transition hover:shadow-xl hover:border-indigo-200">
                    <div class="text-4xl font-extrabold text-indigo-600">48</div>
                    <div class="text-sm font-medium text-gray-500 mt-1">Total Kamar</div>
                </div>
                <!-- Stat Card 2 -->
                <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100 text-center transition hover:shadow-xl hover:border-blue-200">
                    <div class="text-4xl font-extrabold text-blue-600">15</div>
                    <div class="text-sm font-medium text-gray-500 mt-1">Kamar Tersedia</div>
                </div>
                <!-- Stat Card 3 -->
                <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100 text-center transition hover:shadow-xl hover:border-green-200">
                    <div class="text-4xl font-extrabold text-green-600">33</div>
                    <div class="text-sm font-medium text-gray-500 mt-1">Kamar Terisi</div>
                </div>
                <!-- Stat Card 4 -->
                <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100 text-center transition hover:shadow-xl hover:border-yellow-200">
                    <div class="text-4xl font-extrabold text-yellow-600">A-D</div>
                    <div class="text-sm font-medium text-gray-500 mt-1">Total Lantai</div>
                </div>
            </div>
        </section>

        <!-- Section 3: Search Results (Original content structure) -->
        <section class="py-10">
            <!-- MOCK: Data Not Found -->
            <!-- Uncomment this block to see the 'Data Tidak Ditemukan' view -->
            <!--
            <div class="text-center py-20 bg-white rounded-xl shadow-lg mb-10">
                <h1 class="text-3xl font-semibold text-gray-700">Data Tidak Ditemukan</h1>
                <p class="text-gray-500 mt-2">Coba cari dengan nomor kamar atau tipe yang lain.</p>
            </div>
            -->
            
         
            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-6 mt-4">
                <!-- Card 1 (Tersedia / Available) -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transition duration-300">
                    <div class="p-5">
                        <span class="text-sm font-medium text-white px-3 py-1 rounded-full bg-green-500">Tersedia</span>
                        <h2 class="text-3xl font-bold mt-2 text-gray-900">Kamar A-101</h2>
                        <p class="text-gray-500 mt-1 text-sm">Lantai A, Tipe Standard</p>
                        
                        <div class="mt-4 flex flex-col space-y-2 text-gray-600 text-sm">
                            <p class="flex items-center"><svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m0 0l-1 2m1 0h12m0-5V5m0 5H7m5 5v2m-7-5h5"></path></svg>Kapasitas: 2 Orang</p>
                            <p class="flex items-center"><svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c1.657 0 3 1.343 3 3v2a3 3 0 01-3 3h-2m-3 3h5a2 2 0 002-2v-5a2 2 0 00-2-2h-3a2 2 0 00-2 2v5a2 2 0 002 2z"></path></svg>AC, WiFi, Kamar Mandi Dalam</p>
                        </div>

                        <button class="w-full mt-6 bg-indigo-500 text-white py-2 rounded-lg font-semibold hover:bg-indigo-600 transition duration-200 shadow-md">Detail Kamar</button>
                    </div>
                </div>

                <!-- Card 2 (Terisi / Occupied) -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 opacity-80 hover:shadow-xl transition duration-300">
                    <div class="p-5">
                        <span class="text-sm font-medium text-white px-3 py-1 rounded-full bg-red-500">Terisi</span>
                        <h2 class="text-3xl font-bold mt-2 text-gray-900">Kamar B-205</h2>
                        <p class="text-gray-500 mt-1 text-sm">Lantai B, Tipe Deluxe</p>
                        
                        <div class="mt-4 flex flex-col space-y-2 text-gray-600 text-sm">
                            <p class="flex items-center"><svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m0 0l-1 2m1 0h12m0-5V5m0 5H7m5 5v2m-7-5h5"></path></svg>Kapasitas: 4 Orang</p>
                            <p class="flex items-center"><svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c1.657 0 3 1.343 3 3v2a3 3 0 01-3 3h-2m-3 3h5a2 2 0 002-2v-5a2 2 0 00-2-2h-3a2 2 0 00-2 2v5a2 2 0 002 2z"></path></svg>AC, WiFi, TV, Dapur Mini</p>
                        </div>

                        <button class="w-full mt-6 bg-red-500 text-white py-2 rounded-lg font-semibold cursor-not-allowed opacity-50 shadow-md">Terisi Penuh</button>
                    </div>
                </div>

                <!-- Card 3 (Tersedia / Available) -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transition duration-300">
                    <div class="p-5">
                        <span class="text-sm font-medium text-white px-3 py-1 rounded-full bg-green-500">Tersedia</span>
                        <h2 class="text-3xl font-bold mt-2 text-gray-900">Kamar C-310</h2>
                        <p class="text-gray-500 mt-1 text-sm">Lantai C, Tipe Single</p>
                        
                        <div class="mt-4 flex flex-col space-y-2 text-gray-600 text-sm">
                            <p class="flex items-center"><svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m0 0l-1 2m1 0h12m0-5V5m0 5H7m5 5v2m-7-5h5"></path></svg>Kapasitas: 1 Orang</p>
                            <p class="flex items-center"><svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c1.657 0 3 1.343 3 3v2a3 3 0 01-3 3h-2m-3 3h5a2 2 0 002-2v-5a2 2 0 00-2-2h-3a2 2 0 00-2 2v5a2 2 0 002 2z"></path></svg>AC & WiFi</p>
                        </div>

                        <button class="w-full mt-6 bg-indigo-500 text-white py-2 rounded-lg font-semibold hover:bg-indigo-600 transition duration-200 shadow-md">Detail Kamar</button>
                    </div>
                </div>
            </div>
            
            <div class="flex justify-center mt-12 mb-8">
                <nav aria-label="Page navigation example">
                    <ul class="inline-flex items-center -space-x-px text-sm">
                        <li>
                            <span class="flex items-center justify-center px-4 py-2 leading-tight text-gray-400 bg-white border border-gray-300 rounded-l-lg cursor-not-allowed">
                                &laquo; Previous
                            </span>
                        </li>
                        <li>
                            <span aria-current="page" class="z-10 flex items-center justify-center px-4 py-2 leading-tight text-white bg-indigo-600 border border-indigo-600">
                                1
                            </span>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-center px-4 py-2 leading-tight text-gray-600 bg-white border border-gray-300 hover:bg-gray-100 hover:text-indigo-700">
                                2
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-center px-4 py-2 leading-tight text-gray-600 bg-white border border-gray-300 hover:bg-gray-100 hover:text-indigo-700">
                                3
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-center px-4 py-2 leading-tight text-gray-600 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-indigo-700">
                                Next &raquo;
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

        </section>

    </main>
</body>

</html>
