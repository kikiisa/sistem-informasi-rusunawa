<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SIPR - Sistem Informasi Penginapan & Reservasi</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
      <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: "Outfit", sans-serif;
        }
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .search-glow:focus {
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .float-animation {
            animation: float 6s ease-in-out infinite;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
    </style>
</head>

<body class="bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50 min-h-screen">

    <!-- Navbar -->
    <nav class="fixed w-full top-0 z-50 glass-effect shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-3">
                    <div
                        class="w-10 h-10 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </div>
                    <span
                        class="text-2xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">SIPR</span>
                </div>
                <div class="flex items-center space-x-4">
                    <button
                        class="px-4 py-2 text-gray-700 hover:text-indigo-600 font-medium transition">Beranda</button>
                    <button
                        class="px-4 py-2 text-gray-700 hover:text-indigo-600 font-medium transition">Tentang</button>
                    <a href="{{ route('login') }}"
                        class="px-6 py-2 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-full font-semibold hover:shadow-lg transition">Masuk</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="pt-32 pb-20 px-4">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12 float-animation">
                <div class="inline-block mb-4">
                    <span class="px-4 py-2 bg-indigo-100 text-indigo-600 rounded-full text-sm font-semibold">✨ Platform
                        Terpercaya</span>
                </div>
                <h1 class="text-2xl md:text-7xl font-bold mb-6 leading-tight">
                    <span
                        class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">
                        Sistem Informasi Rusunawa
                    </span>
                    <br />
                    <span class="text-gray-800"> Kota Gorontalo</span>
                </h1>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Platform resmi Dinas Perkim Kota Gorontalo untuk memudahkan pengelolaan hunian, layanan
                    administrasi, dan akses informasi Rusunawa secara cepat dan transparan.

                </p>
            </div>

            <!-- Search Bar -->
            <div class="max-w-3xl mx-auto mb-16">
                <form class="relative" method="GET">
                    <div class="relative group">
                        <div
                            class="absolute -inset-1 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-2xl blur opacity-25 group-hover:opacity-40 transition">
                        </div>
                        <div class="relative flex items-center bg-white rounded-2xl shadow-xl overflow-hidden">
                            <div class="pl-6 pr-3 py-5">
                                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="m21 21-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input type="search" name="search" id="search"
                                class="flex-1 py-5 text-lg text-gray-900 outline-none search-glow"
                                placeholder="Cari nomor kamar (contoh: 101, 202, 303...)" />
                            <button type="submit"
                                class="m-2 px-8 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold rounded-xl hover:shadow-lg transform hover:scale-105 transition">
                                Cari Sekarang
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
                <div class="bg-white rounded-2xl p-6 shadow-lg text-center">
                    <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-800 mb-1">{{ $total_kamar }}</h3>
                    <p class="text-gray-600">Jumlah Kamar</p>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-lg text-center">
                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-800 mb-1">{{ $pengguna }}+</h3>
                    <p class="text-gray-600">Pengguna Aktif</p>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-lg text-center">
                    <div class="w-12 h-12 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-800 mb-1">{{ $transaksi }}</h3>
                    <p class="text-gray-600">Total Transaksi</p>
                </div>
            </div>

            <!-- Room Cards -->
            <div id="roomsContainer">
                @if ($data->isEmpty())
                    <div id="emptyState" class="text-center py-16">
                        <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">Data Tidak Ditemukan</h3>
                        <p class="text-gray-600">Maaf, kamar yang Anda cari tidak tersedia saat ini</p>
                    </div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <!-- Sample Room Card 1 -->
                        @foreach ($data as $item)
                            <div class="bg-white rounded-2xl overflow-hidden shadow-lg card-hover">
                                <div class="h-32 bg-gradient-to-br from-indigo-400 to-purple-500 relative">

                                    <!-- Ikon Rumah -->
                                    <div class="absolute top-4 left-4 bg-white/30 backdrop-blur-sm p-2 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                            stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3 10.5L12 4l9 6.5M4.5 10.5V20h15v-9.5M9 20v-5h6v5" />
                                        </svg>
                                    </div>

                                    <!-- Status Badge -->
                                    <div
                                        class="absolute top-4 right-4 bg-white px-3 py-1 rounded-full text-sm font-semibold text-indigo-600">
                                        @if ($item->status == 'tersedia')
                                            <span>Tersedia</span>
                                        @else
                                            <span>Tidak Tersedia</span>
                                        @endif
                                    </div>

                                </div>

                                <div class="p-6">
                                    <div class="flex items-center justify-between mb-3">
                                        <h3 class="text-2xl font-bold text-gray-800">Kamar {{ $item->no_kamar }}</h3>
                                        <span class="text-indigo-600 font-semibold">Lantai {{ $item->lt_kamar }}</span>
                                    </div>

                                    <p class="text-gray-600 mb-4">{{ $item->keterangan }}</p>

                                    <div class="flex items-center justify-between mb-4">
                                        <span class="text-2xl font-bold text-indigo-600">
                                            Rp {{ number_format($item->harga, 0, ',', '.') }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Pagination -->
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
                                            class="flex items-center justify-center px-4 h-10 text-indigo-600 border border-gray-300 indigo50 dark:border-gray-700 dark:bg-gray-700 dark:text-white">{{ $page }}</span>
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
            {{-- <div class="flex justify-center mt-12">
                <nav class="inline-flex rounded-2xl shadow-lg overflow-hidden bg-white">
                    <button class="px-4 py-3 text-gray-500 hover:bg-gray-50 font-medium transition">Previous</button>
                    <button class="px-4 py-3 bg-indigo-600 text-white font-medium">1</button>
                    <button class="px-4 py-3 text-gray-700 hover:bg-gray-50 font-medium transition">2</button>
                    <button class="px-4 py-3 text-gray-700 hover:bg-gray-50 font-medium transition">3</button>
                    <button
                        class="px-4 py-3 text-gray-700 hover:bg-indigo-600 hover:text-white font-medium transition">Next</button>
                </nav>
            </div> --}}
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12 mt-20">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <div class="mb-6">
                <span
                    class="text-3xl font-bold bg-gradient-to-r from-indigo-400 to-purple-400 bg-clip-text text-transparent">SIPR</span>
            </div>
            <p class="text-gray-400 mb-4">Platform Sistem Informasi Penginapan & Reservasi Terpercaya</p>

            <p class="text-gray-500 text-sm">© {{ date('Y') }} SIPR. All rights reserved.</p>
        </div>
    </footer>

    <script>
        function handleSearch(e) {
            e.preventDefault();
            const searchValue = document.getElementById('search').value;
            // Simulate search functionality
            if (searchValue.trim()) {
                alert('Mencari kamar: ' + searchValue);
                // In real implementation, this would trigger actual search
            }
        }
    </script>
</body>

</html>
