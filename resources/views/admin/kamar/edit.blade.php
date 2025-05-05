@extends('layouts.admin',["title" => "Edit Informasi Kamar"])
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <div class="title mb-4">
                <div class="flex flex-row gap-2">
                    
                    <h1 class="font-bold text-2xl">Edit Informasi Kamar</h1>
                </div>
            </div>
            @if (session()->has('success'))
                <div id="alert-3"
                    class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                    role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ms-3 text-sm font-medium">
                        {{ session()->get('success') }}
                    </div>
                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                        data-dismiss-target="#alert-3" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            @endif
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
            <!-- Form Tambah/Edit Data Kamar -->
            <!-- resources/views/kamar/edit.blade.php -->

            <form action="{{ route('kamar.update', $kamar->id) }}" method="POST"
                class=" mx-auto p-6 bg-white rounded-2xl shadow-md space-y-6">
                @csrf
                @method('PUT')

                <!-- No Kamar -->
                <div>
                    <label for="no_kamar" class="block mb-2 text-sm font-medium text-gray-700">No Kamar</label>
                    <input type="text" id="no_kamar" name="no_kamar" value="{{ old('no_kamar', $kamar->no_kamar) }}"
                        class="block w-full p-2.5 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>

                <!-- Lantai Kamar -->
                <div>
                    <label for="lt_kamar" class="block mb-2 text-sm font-medium text-gray-700">Lantai Kamar</label>
                    <input type="text" id="lt_kamar" name="lt_kamar" value="{{ old('lt_kamar', $kamar->lt_kamar) }}"
                        class="block w-full p-2.5 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>

                <!-- Fasilitas -->
                <div>
                    <label for="fasilitas" class="block mb-2 text-sm font-medium text-gray-700">Fasilitas</label>
                    <input type="text" id="fasilitas" name="fasilitas" value="{{ old('fasilitas', $kamar->fasilitas) }}"
                        class="block w-full p-2.5 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>

                <!-- Harga -->
                <div>
                    <label for="harga" class="block mb-2 text-sm font-medium text-gray-700">Harga</label>
                    <input type="text" id="harga" name="harga" value="{{ old('harga', $kamar->harga) }}"
                        class="block w-full p-2.5 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block mb-2 text-sm font-medium text-gray-700">Status</label>
                    <select id="status" name="status"
                        class="block w-full p-2.5 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        <option value="tersedia" {{ old('status', $kamar->status) == 'tersedia' ? 'selected' : '' }}>
                            Tersedia</option>
                        <option value="tidak_tersedia"
                            {{ old('status', $kamar->status) == 'tidak_tersedia' ? 'selected' : '' }}>Tidak Tersedia
                        </option>
                    </select>
                </div>

                <!-- Keterangan -->
                <div>
                    <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-700">Keterangan</label>
                    <textarea id="keterangan" name="keterangan" rows="4"
                        class="block w-full p-2.5 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Tambahkan keterangan tambahan (opsional)">{{ old('keterangan', $kamar->keterangan) }}</textarea>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit"
                        class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Update
                    </button>
                </div>
            </form>


        </div>
    </div>
@endsection
