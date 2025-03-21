@extends('layouts.admin')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <div class="title">
                <div class="flex flex-row gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
                    </svg>
                    <h1 class="font-bold text-2xl">SIPR V.1.0</h1>
                </div>  
            </div>
            <div class="statistik grid grid-cols-2 gap-4 mt-4">
                <div class=" bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                    <div class="flex justify-between">
                        <div>
                            <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">
                                {{ $totalBerkasBulanIni }} Berkas</h5>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">Berkas Masuk Bulan Ini</p>
                        </div>
                    </div>
                </div>
                <div class=" bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                    <div class="flex justify-between">
                        <div>
                            <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">
                                {{ $totalBerkas }} Berkas</h5>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">Total Berkas</p>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection
