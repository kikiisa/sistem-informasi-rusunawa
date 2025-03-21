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
            <form action="" enctype="multipart/form-data" method="post">
                @csrf
                @method('post')
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-3 bg-white mb-14">
                    <table id="data-table" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Persyaratan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    File
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Aksi
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr
                                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item->nama_file }}
                                    </th>
                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-block px-2 py-1 font-semibold leading-tight text-white transform bg-red-600 rounded-full">PDF</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a 
                                            href="{{ route('berkas.edit', $item->id) }}"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </form>
        </div>
    </div>

@endsection
