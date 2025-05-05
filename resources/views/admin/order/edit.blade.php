@extends('layouts.admin', ['title' => 'Edit Order'])
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <div class="title mb-4">
                <div class="flex flex-row gap-2 mb-3">
                    
                    <h1 class="font-bold text-2xl">Detail Order</h1>
                </div>
                <div class="relative overflow-x-auto">
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
                    <form action="{{ route('order.update', $data->id) }}" method="POST" enctype="multipart/form-data"
                        class=" mx-auto bg-white dark:bg-gray-800 shadow-lg rounded-lg p-8">
                        @csrf
                        @method('PUT')

                        <!-- Header Invoice -->
                        <div class="border-b pb-4 mb-6">
                            
                            <p class="text-sm text-gray-500 dark:text-gray-400">Tanggal: {{ $data->created_at }}</p>
                        </div>

                        <!-- Informasi Pemesan -->
                        

                        <!-- Informasi Kamar -->
                        <input type="hidden" name="id_kamar" value="{{ $data->id }}">
                        <table class="w-full text-sm text-left mb-6">
                            <tbody>
                                <tr>
                                    <td class="font-semibold text-gray-700 dark:text-white w-48">Nama Pemesan</td>
                                    <td>: {{ $data->user->name }}</td>
                                </tr>
                                <tr>
                                    <td class="font-semibold text-gray-700 dark:text-white">Email</td>
                                    <td>: {{ $data->user->email }}</td>
                                </tr>
                                <tr>
                                    <td class="font-semibold text-gray-700 dark:text-white w-48">Nomor Kamar</td>
                                    <td>: {{ $data->kamar->no_kamar }}</td>
                                </tr>
                                <tr>
                                    <td class="font-semibold text-gray-700 dark:text-white">Lantai</td>
                                    <td>: {{ $data->kamar->lt_kamar }}</td>
                                </tr>
                                <tr>
                                    <td class="font-semibold text-gray-700 dark:text-white">Fasilitas</td>
                                    <td>: {{ $data->kamar->fasilitas }}</td>
                                </tr>
                                <tr>
                                    <td class="font-semibold text-gray-700 dark:text-white">Harga / Bulan</td>
                                    <td>: <span class="text-green-600 font-semibold">Rp
                                            {{ number_format($data->kamar->harga, 0, ',', '.') }}</span></td>
                                </tr>
                               
                                <tr>
                                    <td class="font-semibold text-gray-700 dark:text-white">Pengajuan Masa Kontrak</td>
                                    <td>: <span
                                            class="inline-block bg-green-200 text-green-800 px-3 py-1 rounded text-xs font-medium">
                                            {{ $data->waktu_kontrak }}
                                        </span></td>
                                </tr>
                                <tr>
                                    <td class="font-semibold text-gray-700 dark:text-white">Sisa Kontrak</td>
                                    <td>: {{expired($data->tanggal_order,$data->waktu_berakhir)}}</td>
                                </tr>
                                <tr>
                                    <td class="font-semibold text-gray-700 dark:text-white">Total Kontrak</td>
                                    <td>: {{countMonth($data->tanggal_order,$data->waktu_berakhir)}}</td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- Update Status Kontrak -->
                        <div class="mb-4">
                            <label for="status_kontrak"
                                class="block mb-1 text-sm font-medium text-gray-800 dark:text-white">Status Kontrak</label>
                            <select name="status_kontrak" id="status_kontrak"
                                class="w-full p-2.5 bg-gray-50 border border-gray-300 text-sm text-gray-900 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                required>
                                <option value="pending" @selected($data->status_order == 'pending')>Pending</option>
                                <option value="approved" @selected($data->status_order == 'approved')>Approved</option>
                                <option value="rejected" @selected($data->status_order == 'rejected')>Rejected</option>
                            </select>
                        </div>

                        <!-- Tanggal Kontrak -->
                        <div class="flex flex-row gap-4 mb-4">
                            <div class="w-1/2">
                                <label for="tanggal_order"
                                    class="block mb-1 text-sm font-medium text-gray-800 dark:text-white">Mulai
                                    Kontrak</label>
                                <input type="date" value="{{ old('tanggal_order', \Carbon\Carbon::parse($data->tanggal_order)->format('Y-m-d')) }}" name="tanggal_order"
                                    class="w-full p-2.5 bg-gray-50 border border-gray-300 text-sm text-gray-900 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                    required>
                            </div>
                            <div class="w-1/2">
                                <label for="waktu_berakhir"
                                    class="block mb-1 text-sm font-medium text-gray-800 dark:text-white">Berakhir
                                    Kontrak</label>
                                <input type="date" value="{{ old('waktu_berakhir', \Carbon\Carbon::parse($data->waktu_berakhir)->format('Y-m-d')) }}" name="waktu_berakhir"
                                    class="w-full p-2.5 bg-gray-50 border border-gray-300 text-sm text-gray-900 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                    required>
                            </div>
                        </div>

                        <!-- Bukti Pembayaran -->
                        <div class="mb-6">
                            <a data-modal-target="default-modal" data-modal-toggle="default-modal"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                Lihat Bukti Pembayaran
                            </a>
                        </div>

                        <!-- Submit -->
                        <div class="text-right">
                            <button type="submit"
                                class="px-6 py-2 text-sm font-semibold text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 rounded-md hover:from-green-500 hover:to-green-700 focus:outline-none focus:ring-4 focus:ring-green-300 dark:focus:ring-green-800">
                                Update Kontrak
                            </button>
                        </div>
                    </form>

                </div>
            </div>
            <div id="default-modal" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 lg:w-1/2">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                        <!-- Modal header -->
                        <div
                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Bukti Pembayaran
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="default-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
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
    </div>
@endsection
