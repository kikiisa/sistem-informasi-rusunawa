@extends('layouts.users')
@section('content')
    <div class=" w-full mb-14">
        
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
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4 bg-white">
                <form action="{{ route('management-kontrak.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <input type="text" name="id_kamar" value="{{ $data->id }}" hidden>
                    <h2 class="text-xl font-bold text-gray-800 mb-2">Kamar No. {{ $data->no_kamar }}</h2>
                    <p class="text-gray-600">Lantai: <span class="font-semibold">{{ $data->lt_kamar }}</span></p>
                    <p class="text-gray-600">Fasilitas: <span class="font-semibold">{{ $data->fasilitas }}</span></p>
                    <p class="text-gray-600">Harga: <span class="font-semibold text-green-600">Rp
                            {{ number_format($data->harga, 0, ',', '.') }}</span> / Bulan</p>
                    <p class="text-sm font-semibold mt-2">
                        Status: <span
                            class="{{ $data->status === 'tersedia' ? 'text-green-600' : 'text-red-600' }}">{{ ucfirst($data->status) }}</span>
                    </p>
                    <p class="text-gray-500 text-sm mt-2">Keterangan: {{ $data->keterangan }}</p>
                    <div class="mt-4">
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Masa Kontrak</label>
                        <select id="countries" name="masa_kontrak"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Pilih Waktu Kontrak</option>
                            <option value="1 bulan">1 Bulan</option>
                            <option value="3 bulan">3 Bulan</option>
                            <option value="6 bulan">6 Bulan</option>
                            <option value="1 tahun">1 Tahun</option>
                        </select>
                    </div>
                    <div class="mt-4">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload
                            Bukti Pembayaran</label>
                        <input
                            name="bukti_pembayaran"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="file_input" type="file">
                    </div>
                    <button type="submit"
                        class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 mt-3 py-2.5 text-center me-2 mb-2">Ajukan
                        Kontrak</button>
                </form>
            </div>
        </div>
    </div>
@endsection
