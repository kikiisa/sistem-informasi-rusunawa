<nav class="bg-white lg:w-1/2 mx-auto sm:w-full dark:bg-gray-900 shadow-md sticky top-0 z-20 border-b border-gray-200 dark:border-gray-700">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto px-6 py-3">
        
        <!-- Logo -->
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0c/LOGO_KOTA_GORONTALO.png/792px-LOGO_KOTA_GORONTALO.png" 
                 class="h-10 w-10 object-contain" 
                 alt="Logo Kota Gorontalo">
            <span class="self-center text-2xl font-bold tracking-wide bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                SIPR
            </span>
        </a>

        <!-- Right Button & Mobile Menu -->
        <div class="flex items-center md:order-2 space-x-3">
            <a href="{{ route('login') }}"
               class="px-4 py-2 rounded-lg text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 transition-all duration-200 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
               Masuk
            </a>
            <!-- Mobile Menu Button -->
            <button data-collapse-toggle="navbar-sticky" type="button"
                class="inline-flex items-center justify-center w-10 h-10 text-gray-600 rounded-lg md:hidden hover:bg-gray-100 focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-800 dark:focus:ring-gray-600 transition-all"
                aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        <!-- Menu Items -->
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium md:space-x-8 md:flex-row md:mt-0 bg-gray-50 rounded-lg border md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">
                <li>
                    <a href="#"
                       class="block py-2 px-3 rounded-lg text-blue-700 font-semibold md:p-0 md:hover:text-blue-600 transition-colors dark:text-blue-400"
                       aria-current="page">Beranda</a>
                </li>
                <li>
                    <a href="#"
                       class="block py-2 px-3 rounded-lg text-gray-700 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-600 md:p-0 transition-colors dark:text-gray-300 dark:hover:text-white">
                       Tentang Kami
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
