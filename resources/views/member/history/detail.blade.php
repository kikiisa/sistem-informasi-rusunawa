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
            <div class=" mb-14">
                <form action="{{ route('order.update', $data->id) }}" method="POST" enctype="multipart/form-data"
                    class="mx-auto bg-white shadow-lg rounded-lg p-8 dark:bg-gray-800">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id_kamar" value="{{ $data->id }}">

                    <!-- Header Invoice -->
                    <div class="mb-6 border-b pb-4">
                        <h1 class="text-2xl font-bold text-gray-800 dark:text-white">INVOICE KONTRAK KAMAR</h1>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Tanggal: {{ $data->created_at }}</p>
                    </div>

                    <!-- Informasi Kamar -->
                    <table class="w-full text-sm text-left mb-6">
                        <tbody>
                            <tr>
                                <td class="font-semibold text-gray-700 dark:text-white w-40">Nomor Kamar</td>
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
                                <td class="font-semibold text-gray-700 dark:text-white">Harga Sewa</td>
                                <td>: <span class="text-green-600 font-semibold">Rp
                                        {{ number_format($data->kamar->harga, 0, ',', '.') }}</span> / Bulan</td>
                            </tr>
                            <tr>
                                <td class="font-semibold text-gray-700 dark:text-white">Sisa Kontrak</td>
                                <td>:
                                    {{expired($data->tanggal_order,$data->waktu_berakhir)}}         
                                </td>
                            </tr>
                            <tr>
                                <td class="font-semibold text-gray-700 dark:text-white">Mulai Kontrak</td>
                                <td>:
                                    {{format_tanggal($data->tanggal_order)}}         
                                </td>
                            </tr>
                            <tr>
                                <td class="font-semibold text-gray-700 dark:text-white">Batas Kontrak</td>
                                <td>:
                                    {{format_tanggal($data->waktu_berakhir)}}         
                                </td>
                            </tr>

                        </tbody>
                    </table>
                    @if ($data->status_order != 'approved')
                        
                    <div class="mb-4">
                        <label for="masa_kontrak" class="block mb-1 text-sm font-medium text-gray-800 dark:text-white">Masa
                            Kontrak</label>
                        <select name="masa_kontrak" id="masa_kontrak"
                            class="w-full p-2.5 bg-gray-50 border border-gray-300 text-sm text-gray-900 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                            required>
                            <option selected disabled>Pilih Waktu Kontrak</option>
                            <option value="1 bulan">1 Bulan</option>
                            <option value="3 bulan">3 Bulan</option>
                            <option value="6 bulan">6 Bulan</option>
                            <option value="1 tahun">1 Tahun</option>
                        </select>
                    </div>

                    <!-- Upload Bukti Pembayaran -->
                    <div class="mb-6">
                        <label for="file_input" class="block mb-1 text-sm font-medium text-gray-800 dark:text-white">Upload
                            Bukti Pembayaran</label>
                        <input type="file" name="file" id="file_input"
                            class="w-full text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-md cursor-pointer dark:text-gray-400 dark:bg-gray-700 dark:border-gray-600"
                            required>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Format file: JPG, PNG, atau PDF.</p>
                        <a data-modal-target="default-modal" data-modal-toggle="default-modal"
                            class="block mt-3 cursor-pointer text-white w-1/3 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">
                            Bukti Pembayaran
                        </a>
                    </div>

                    <!-- Submit -->

                    <div class="text-right">

                        <button type="submit"
                            class="px-6 py-2 text-sm font-semibold text-white bg-green-600 rounded-md hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-green-300 dark:focus:ring-green-800">
                            Update Kontrak
                        </button>
                    </div>
                    @endif
                    <!-- Pilihan Masa Kontrak -->

                </form>

            </div>
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
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
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
