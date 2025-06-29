<div
    class="card block  p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
    <a href="#" class="">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">No : {{ $item->no_kamar }}</h5>
        @if ($item->status == 'tersedia')
            <span
                class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300 w-1/2">Tersedia</span>
        @else
            <span
                class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-red-900 dark:text-red-300 w-1/2">Tidak
                Tersedia</span>
        @endif
        <p class="font-normal text-gray-700 dark:text-gray-400">{{ $item->keterangan }}</p>
        <div class="button-sheet mt-4">
            <a href="{{ route('detail', $item->uuid) }}"
                class="flex justify-center items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <span class="font-bold">Detail Kamar</span>
                <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 12H5m14 0-4 4m4-4-4-4" />
                </svg>
            </a>
        </div>
    </a>
</div>
