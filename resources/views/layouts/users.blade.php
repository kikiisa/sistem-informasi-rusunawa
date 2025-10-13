<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">
    <title>SIPR</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bg-slate-100">
    <main class="lg:w-1/2 mx-auto p-4">
        @php
    // Ganti dengan logika Anda untuk mengambil jumlah notifikasi yang belum dibaca
    $unreadNotificationsCount = 5; // Contoh nilai
@endphp

<nav class="bg-transparent border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{ route('member.dashboard') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0c/LOGO_KOTA_GORONTALO.png/792px-LOGO_KOTA_GORONTALO.png"
                class="h-8 rounded-full" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">SIPR</span>
        </a>
        
        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">

            {{-- Loneng Notifikasi --}}
            <button type="button" 
                class="p-2 me-2 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700 relative" 
                id="notification-button" 
                aria-expanded="false" 
                data-dropdown-toggle="notification-dropdown" 
                data-dropdown-placement="bottom-end">
                
                {{-- Icon Lonceng --}}
                
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0M3.124 7.5A8.969 8.969 0 0 1 5.292 3m13.416 0a8.969 8.969 0 0 1 2.168 4.5" />
                </svg>

                {{-- Badge Notifikasi (hanya tampil jika ada notifikasi belum dibaca) --}}
                @if ($notifictions->count() > 0)
                    <div class="absolute inline-flex items-center justify-center w-5 h-5 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-1 -end-1 dark:border-gray-900">
                        {{ $notifictions->count() }}
                    </div>
                
                @endif
                            </button>
            
            {{-- Dropdown Notifikasi (Isi disesuaikan kebutuhan) --}}
            <div id="notification-dropdown" class="z-50 hidden w-full max-w-sm bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600 md:w-80">
                <div class="block px-4 py-2 font-medium text-center text-gray-700 rounded-t-lg bg-gray-50 dark:bg-gray-800 dark:text-white">
                    Notifikasi
                </div>
                <div class="divide-y divide-gray-100 dark:divide-gray-700 max-h-60 overflow-y-auto">
                    {{-- Contoh Item Notifikasi --}}
                    @forelse ($notifictions as $item)     
                        <a href="#" class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600">
                            <div class="w-full ps-3">
                                <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400">
                                    <span class="font-semibold text-gray-900 dark:text-white">{{ $item->judul }}</span> {{ $item->isi }}
                                </div>
                                <div class="text-xs text-blue-600 dark:text-blue-500">
                                    {{ $item->created_at->diffForHumans() }}
                                </div>
                            </div>
                        </a>
                    @empty
                        <p class="text-center text-gray-500 text-sm">belum ada notifikasi</p>
                    @endforelse
                    
                </div>
                <a href="{{ route('read-notif') }}" class="block py-2 text-sm font-medium text-center text-gray-900 rounded-b-lg bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-white">
                    Lihat semua notifikasi
                </a>
            </div>
            {{-- Akhir Loneng Notifikasi --}}


            {{-- Tombol User (dipindahkan ke bawah tombol notifikasi) --}}
            <button href=""
                class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                data-dropdown-placement="bottom">
                <span class="sr-only">Open user menu</span>
                <div class="w-10 h-10 rounded-full p-2 text-white flex items-center justify-center">
                    <span class="text-sm font-medium">
                        {{ get_initials(Auth::user()->name) }}
                    </span>
                </div>
            </button>
            
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-sm dark:bg-gray-700 dark:divide-gray-600"
                id="user-dropdown">
                <div class="px-4 py-3">
                    <span class="block text-sm text-gray-900 dark:text-white">{{ auth()->user()->name }}</span>
                    <span
                        class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ auth()->user()->email }}</span>
                </div>
                <ul class="py-2" aria-labelledby="user-menu-button">
                    <li>
                        <a href="{{ route('member.dashboard') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Beranda</a>
                    </li>

                    <li>
                        <a href="{{ route('profile.index') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Pengaturan
                            Akun</a>
                    </li>
                    <li>
                        <a href="{{ route('logout.member') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            Keluar
                        </a>
                    </li>
                </ul>
            </div>
            {{-- Akhir Dropdown menu User --}}

        </div>
    </div>
</nav>
        <section class="content m-4">
            <!-- Breadcrumb -->
            <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700"
                aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="{{ route('member.dashboard') }}"
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                            </svg>
                            Home
                        </a>
                    </li>

                    @php
                        $segments = Request::segments();
                        $url = url('/');
                    @endphp

                    @foreach ($segments as $key => $segment)
                        @php
                            $url .= '/' . $segment;
                        @endphp
                        <li>
                            <div class="flex items-center">
                                
                                @if ($key == count($segments) - 1)
                                    @if (is_numeric($segment))
                                    <span
                                        class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400 capitalize">
                                        Detail
                                    </span>
                                    @else    
                                    <span
                                        class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400 capitalize">
                                        {{str_replace('-', ' ', $segment)}}
                                    </span>
                                    @endif
                                    
                                @endif
                            </div>
                        </li>
                    @endforeach
                </ol>
            </nav>

            {{-- end breadcrumb --}}
            @yield('content')


            <div
                class="fixed bottom-0 left-0 z-50 w-full h-16 bg-white border-t border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                <div class="grid h-full max-w-lg grid-cols-3 font-medium mx-auto">

                    <a href="{{Route('riwayat-kontrak')}}"
                        class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                        <svg class="w-6 h-6 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path><path d="M13 7h-2v5.414l3.293 3.293 1.414-1.414L13 11.586z"></path></svg>
                
                        <span
                            class="text-sm text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500">Riwayat</span>
                    </a>
                    <a href="{{route("member.dashboard")}}"
                        class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                        <svg class="w-5 h-5 mb-2 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        <span
                            class="text-sm text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500">Beranda</span>
                    </a>
                    <a href="{{route("profile.index")}}"
                        class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                        <svg class="w-5 h-5 mb-2 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                        </svg>
                        <span
                            class="text-sm text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500">Akun</span>
                    </a>
                </div>
            </div>

        </section>
    </main>

</body>

</html>
