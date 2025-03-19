@extends('layouts.admin')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <div class="title mb-4">
                <div class="flex flex-row gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
                    </svg>
                    <h1 class="font-bold text-2xl">Daftar Permohonan</h1>
                </div>
            </div>
            <table id="data-table" class=" w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Lengkap
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Berkas Masuk
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Status Verifikasi

                        </th>

                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $loop->iteration }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $item->name }}
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class=" text-sm bg-blue-100 text-blue-800 font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                    {{ $item->berkas->count() }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                @php
                                    $data = collect($item->berkas);
                                    $approved = $data->where('status', 'approved')->count();
                                @endphp
                                
                                @if ($approved ==  $perizinan)
                                    <span class=" text-sm bg-green-100 text-green-800 font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                        Memenuhi Syarat
                                    </span>
                                
                                @else
                                    <span class=" text-sm bg-yellow-100 text-yellow-800 font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">
                                        Menunggu Verifikasi
                                    </span>
                                @endif

                            </td>

                            <td class="px-6 py-4">
                                <a href="{{ route('permohonan.edit', $item->id) }}"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Detail</a>
                                    
                                    @if ($approved ==  $perizinan)
                                    <a href="{{ route('permohonan.edit', $item->id) }}"
                                        class="text-white bg-yellow-400 hover:bg-yellow-300 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-yellow-400 dark:hover:bg-yellow-300 dark:focus:ring-yellow-400">Cetak Surat Izin</a>
                                        
                                    @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
