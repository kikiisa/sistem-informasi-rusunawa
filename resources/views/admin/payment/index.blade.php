@extends('layouts.admin', ['title' => 'Daftar Order'])
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <div class="title mb-4">
                <div class="flex flex-row gap-2 mb-3">

                    <h1 class="font-bold text-2xl">Daftar Payment</h1>
                </div>
                <a href="{{ route('payment.create') }}" data-modal-target="default-modal" data-modal-toggle="default-modal"
                    class="text-white bg-blue-700  hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                    type="button">
                    Tambah Payment
                </a>
            </div>
            <table id="data-table" class=" w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Providers
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
                                {{ $item->providers }}
                            </td>
                            <td class="px-6 py-4 flex flex-wrap">
                                <form action="{{ route('payment.destroy', $item->id) }}" method="post">

                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        class="text-white  bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Hapus</button>
                                    <a href="{{ route('payment.edit', $item->id) }}"
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
