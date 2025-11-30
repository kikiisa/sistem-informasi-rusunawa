@extends('layouts.admin',["title" => "Daftar Pengguna"])
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <div class="title mb-4">
                <div class="flex flex-row gap-2">
                    <h1 class="font-bold text-2xl">Daftar Pengguna</h1>
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
                            Phone
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Akses
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
                                {{ $item->phone }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($item->status == "active")
                                    <span class=" text-sm bg-green-100 text-green-800 font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Aktif</span>
                                @else
                                    <span class=" text-sm bg-red-100 text-red-800 font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Tidak Aktif</span>
                                @endif
                            </td>
                            
                            <td class="px-6 py-4 flex flex-wrap">
                                <form action="{{ route('user.destroy', $item->id) }}" method="post" id="form-delete-{{ $item->id }}"">
                                    @csrf
                                    @method("DELETE")
                                    <button type="button" 
                                    data-id="{{ $item->id }}"
                                        class="text-white bg-red-700 btn-delete hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium  text-sm px-5 py-2.5 text-center rounded-lg me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Hapus</button>
                                    <a href="{{ route('user.edit', $item->id) }}"
                                        class="text-white bg-yellow-400 hover:bg-yellow-300 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium  text-sm px-5 py-2.5 text-center rounded-lg me-2 mb-2 dark:bg-yellow-400 dark:hover:bg-yellow-300 dark:focus:ring-yellow-400">Edit</a>
                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
