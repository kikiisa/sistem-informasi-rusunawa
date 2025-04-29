@extends('layouts.admin',["title" => "Management Kamar"])
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <div class="title mb-4 flex flex-row justify-between">
                <div class="flex flex-col">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
                    </svg>
                    <h1 class="font-bold text-2xl">Daftar Kamar</h1>
                   
                    
                </div>
                <div class="flex flex-row">
                    <a href="{{ route('kamar.create') }}" 
                    class="block mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Tambah Ruangan
                </a>
                </div>
            </div>
            <table id="data-table" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            No Kamar
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Lt Kamar
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $loop->iteration }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $item->no_kamar }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->lt_kamar }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($item->status == 'tersedia')
                                    <span
                                        class=" text-sm bg-green-100 text-green-800 font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                        Tersedia
                                    </span>
                                @endif
                                @if ($item->status == 'tidak_tersedia')
                                    <span
                                        class=" text-sm bg-red-100 text-red-800 font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                                        Tidak Tersedia
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <form action="{{ Route('kamar.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-white  bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Hapus</button>
                                    <a href="{{ route('kamar.edit', $item->id) }}"
                                        class="text-white  bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-400 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-yellow-400 dark:hover:bg-yellow-400 dark:focus:ring-yellow-400">Edit</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
     
    </div>
@endsection
