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
                    <p class="text-sm font-semibold mt-2">

                        Status: <span
                            class="{{ $data->kamar->status === 'tersedia' ? 'text-green-600' : 'text-red-600' }}">{{ ucfirst($data->kamar->status) }}</span>
                    </p>
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
                            class="block mt-3 text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
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
@endsection
