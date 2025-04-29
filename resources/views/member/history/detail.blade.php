@extends('layouts.users')
@section('content')
    <div class=" w-full">
        <div class="content mt-4">
            @if ($errors->any())
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    <span class="font-medium">Danger alert!</span>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4 bg-white mb-14">
                <form action="{{ route('riwayat-kontrak.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-col gap-4 mb-4">
                        <p>Nama Pemesan: <span class="font-semibold">{{ $data->user->name }}</span></p>
                        <p>Email: <span class="font-semibold">{{ $data->user->email }}</span></p>
                    </div>
                    <input type="text" name="id_kamar" value="{{ $data->id }}" hidden>
                    <h2 class="text-xl font-bold text-gray-800 mb-2">Kamar No. {{ $data->kamar->no_kamar }}</h2>
                    <p class="text-gray-600">Lantai: <span class="font-semibold">{{ $data->kamar->lt_kamar }}</span></p>
                    <p class="text-gray-600">Fasilitas: <span class="font-semibold">{{ $data->kamar->fasilitas }}</span></p>
                    <p class="text-gray-600">Harga: <span class="font-semibold text-green-600">Rp
                            {{ number_format($data->kamar->harga, 0, ',', '.') }}</span> / Bulan</p>
                   
                    <div class="mt-4">
                        <p>Pengajuan Masa Kontrak <span
                                class=" bg-green-300 text-green-800 font-medium mr-2 px-2.5 py-0.5 rounded">{{ $data->waktu_kontrak }}</span>
                        </p>
                    </div>
                    <div class="mt-4">
                        <div class="form-group lg:w-1/2">
                            <label for="status_kotrak">Status Kontrak</label>
                            @switch($data->status_order)
                            @case('pending')
                                <span
                                    class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-yellow-900 dark:text-yellow-300">
                                    Pending
                                </span>
                            @break

                            @case('approved')
                                <span
                                    class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">
                                    Di Terima
                                </span>
                            @break

                            @case('rejected')
                                <span
                                    class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-red-900 dark:text-red-300">
                                    Di Tolak
                                </span>
                            @break

                            @default
                                <span
                                    class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-gray-700 dark:text-gray-300">
                                    Tidak Diketahui
                                </span>
                        @endswitch

                            
                        </div>
                        <div class="form-group flex flex-row gap-2">
                            <div class="group-items w-1/2">
                                <label for="waktu_kontrak" class="mb-3">Mulai Kontrak</label>
                                <br>
                                <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-blue-900 dark:text-blue-300">
                                    {{ \Carbon\Carbon::parse($data->tanggal_order)->format('Y F d') }}
                                </span>
                                
                            </div>
                            <div class="group-items w-1/2">
                                <label for="waktu_kontrak" class="mb-3">Berakhir Kontrak</label>
                                <br>
                                <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-blue-900 dark:text-blue-300">
                                    {{ \Carbon\Carbon::parse($data->waktu_berakhir)->format('Y F d') }}
                                </span>
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-3"
                                for="small_size">Bukti Pembayaran</label>
                            <input
                            name="file"
                            required
                                class="block w-full mb-5 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="small_size" type="file">

                        </div>
                        <a data-modal-target="default-modal" data-modal-toggle="default-modal"
                            class="block mt-3 text-white cursor-pointer w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">
                            Lihat Bukti Pembayaran
                        </a>
                    </div>

                    <button type="submit"
                        class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 mt-3 py-2.5 text-center me-2 mb-2">Update
                        Kontrak</button>
                </form>
            </div>
        </div>
    </div>
    <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 lg:w-1/2">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Bukti Pembayaran
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <img src="{{ asset('data/transaksi/' . $data->file) }}" alt="" srcset="">
                </div>
                <!-- Modal footer -->
               
            </div>
        </div>
    </div>
@endsection
