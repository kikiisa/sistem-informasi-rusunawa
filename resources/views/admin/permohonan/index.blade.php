@extends('layouts.admin', ['title' => 'Daftar Permohonan'])
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <div class="title mb-4">
                <div class="flex flex-row gap-2">
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
                        {{-- <th scope="col" class="px-6 py-3">
                            Status Kelengkapan
                        </th>
                         --}}
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
                            <td>

                                @if ($item->status_izin->status == 'approved')
                                    <span
                                        class=" text-sm bg-gray-100 text-slate-800 font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-slate-900 dark:text-slate-300">
                                        Setujui
                                    </span>
                                @else
                                    <span
                                        class=" text-sm bg-red-100 text-red-800 font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                                        Ditolak
                                    </span>
                                @endif
                            </td>
                            {{-- <td class="px-6 py-4">
                                @php
                                    $data = collect($item->berkas);
                                    $approved = $data->where('status', 'approved')->count();
                                @endphp
                                @if ($approved == $perizinan)
                                    <span class=" text-sm bg-green-100 text-green-800 font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                        Lengkap
                                    </span>
                                @else
                                    <span class=" text-sm bg-yellow-100 text-yellow-800 font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">
                                        Belum Lengkap
                                    </span>
                                @endif
                            </td> --}}
                            <td class="px-6 py-4 flex flex-wrap">
                                <a href="{{ route('permohonan.edit', $item->id) }}"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium  text-sm px-5 py-2.5 text-center rounded-lg me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Detail</a>

                                <form action="{{ route('status_permohonan', $item->status_izin->id) }}" method="post">
                                    @csrf
                                    <button
                                        class="text-white bg-slate-700 hover:bg-slate-800 focus:outline-none focus:ring-4 focus:ring-slate-300 font-medium  text-sm px-5 py-2.5 text-center rounded-lg me-2 mb-2 dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800">
                                        @php
                                            if ($item->status_izin->status == 'approved') {
                                                $label = 'Setuju';
                                            } else {
                                                $label = 'Tolak';
                                            }
                                        @endphp
                                        {{ $label }}
                                    </button>
                                </form>
                                {{-- @if ($approved == $perizinan)
                                    <a href="{{ route('permohonan.edit', $item->id) }}"
                                        class="text-white bg-yellow-400 hover:bg-yellow-300 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium  text-sm px-5 py-2.5 text-center rounded-lg me-2 mb-2 dark:bg-yellow-400 dark:hover:bg-yellow-300 dark:focus:ring-yellow-400">Cetak Surat Izin</a>
                                        
                                    @endif --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
