@extends('layouts.admin')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <div class="title mb-4">
                <div class="flex flex-row gap-2 mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
                    </svg>
                    <h1 class="font-bold text-2xl">Detail Order</h1>
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4 bg-white">
                  
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
                    <form action="{{ route('order.update', $data->id) }}" method="POST" enctype="multipart/form-data">
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
                        <p class="text-sm font-semibold mt-2">
                           
                            Status: <span
                                class="{{ $data->kamar->status === 'tersedia' ? 'text-green-600' : 'text-red-600' }}">{{ ucfirst($data->kamar->status) }}</span>
                        </p>
                        <div class="mt-4">     
                           <p>Pengajuan Masa Kontrak <span class=" bg-green-300 text-green-800 font-medium mr-2 px-2.5 py-0.5 rounded">{{ $data->waktu_kontrak }}</span></p>
                        </div>
                        <div class="mt-4">
                            <div class="form-group lg:w-1/2">
                                <label for="status_kotrak">Status Kontrak</label>
                                
                                <select name="status_kontrak" id="" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                                    <option value="pending" @selected($data->status_order == 'pending')>Pending</option>
                                    <option value="approved" @selected($data->status_order == 'approved')>Approved</option>
                                    <option value="rejected" @selected($data->status_order == 'rejected')>Rejected</option>
                                </select>
                            </div>
                            <div class="form-group flex flex-row gap-2">
                                <div class="group-items w-1/2">
                                    <label for="waktu_kontrak" class="mb-3">Mulai Kontrak</label>
                                    <input type="date" name="tanggal_order" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="">
                                </div>
                                <div class="group-items w-1/2">
                                    <label for="waktu_kontrak" class="mb-3">Berakhir Kontrak</label>
                                    <input type="date" name="waktu_berakhir" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="">
                                </div>
                            </div>
                            <a data-modal-target="default-modal" data-modal-toggle="default-modal" class="block mt-3 text-white w-1/3 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
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
    </div>
@endsection
