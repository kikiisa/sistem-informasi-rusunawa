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
                                            ✔
                                        </span>
                                        
                                    @endif
                                    @if ($item->status == 'tidak_tersedia')
                                        <span
                                            class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-red-900 dark:text-red-300">
                                            ❌
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @if ($item->status == 'tersedia')
                                    <a href="{{ route('management-kontrak.show', $item->id) }}"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Kontrak</a>
                                    @else
                                    <span
                                    class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-red-900 dark:text-red-300">
                                    ❌
                                    </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
