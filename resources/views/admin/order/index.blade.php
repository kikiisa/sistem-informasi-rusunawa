@extends('layouts.admin', ['title' => 'Daftar Order'])
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <div class="title mb-4">
                <div class="flex flex-row gap-2">

                    <h1 class="font-bold text-2xl">Daftar Order</h1>
                </div>
            </div>
            <div class="flex flex-row gap-2">
                <form method="GET" class="mb-4 flex flex-wrap items-center gap-2">
                    <select name="bulan" class="border border-gray-300 rounded px-3 py-2 w-100">
                        <option value="">-- Pilih Bulan --</option>
                        @foreach (range(1, 12) as $b)
                            <option value="{{ $b }}" {{ request('bulan') == $b ? 'selected' : '' }}>
                                {{ DateTime::createFromFormat('!m', $b)->format('F') }}
                            </option>
                        @endforeach
                    </select>
    
                    <select name="tahun" class="border border-gray-300 rounded px-3 py-2 w-100">
                        <option value="">-- Pilih Tahun --</option>
                        @foreach (range(date('Y') - 5, date('Y') + 1) as $t)
                            <option value="{{ $t }}" {{ request('tahun') == $t ? 'selected' : '' }}>
                                {{ $t }}</option>
                        @endforeach
                    </select>
    
                    <button type="submit" name="cetak" value="true" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                        Report
                    </button>
                </form>
               
            </div>

            <table id="data-table" class=" w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Sisa Waktu
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status Kontrak
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
                                {{ $item->user->name }}
                            </td>
                            <td class="px-6 py-4">

                                {{ expired($item->tanggal_order, $item->waktu_berakhir) }} Hari
                            </td>
                            <td class="px-6 py-4">
                                @switch($item->status_order)
                                    @case($item->status_order = 'pending')
                                        <span
                                            class="text-sm bg-yellow-100 text-yellow-800 font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">Pending</span>
                                    @break

                                    @case($item->status_order = 'approved')
                                        <span
                                            class="text-sm bg-green-100 text-green-800 font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Di
                                            Terima</span>
                                    @break

                                    @case($item->status_order = 'rejected')
                                        <span
                                            class="text-sm bg-red-100 text-red-800 font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Di
                                            Tolak</span>
                                    @break

                                    @default
                                @endswitch
                            </td>
                            <td class="px-6 py-4 flex flex-wrap">
                                <form action="{{ route('order.destroy', $item->id) }}" method="post">

                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        class="text-white  bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Hapus</button>
                                    <a href="{{ route('order.edit', $item->id) }}"
                                        class="text-white  bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-400 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-yellow-400 dark:hover:bg-yellow-400 dark:focus:ring-yellow-400">Edit</a>

                                </form>
                                <form action="{{ route('send.whatsapp') }}" method="post">
                                    @csrf
                                    @method('POST')
                                    @if ($item->status_order == 'approved')
                                        <button type="submit" name="id" value="{{ $item->id }}"
                                            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Kirim
                                            Notifikasi</button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
