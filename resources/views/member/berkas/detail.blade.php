@extends('layouts.users')
@section('content')
    <main class="flex flex-col items-center justify-center gap-4 mt-3">
        <div class="w-full">
            <div class="content bg-white shadow-xl p-3 rounded-2xl">
                <div class="title mb-3">
                    <div class="flex flex-row gap-2">
                        <h1 class="font-bold">{{ $data['perizinan_file']->nama_file }}</h1>
                    </div>
                </div>
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

                <form action="{{ route('berkas.update', $data['perizinan_file']->id) }}" enctype="multipart/form-data"
                    method="post">
                    @csrf
                    @method('PUT')

                    <div class="mb-5">
                        Status Berkas :
                        @switch($data["status"])
                            @case('pending')
                                <span
                                    class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-yellow-900 dark:text-yellow-300">Pending</span>
                            @break

                            @case('approved')
                                <span
                                    class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">Di
                                    Terima</span>
                            @break

                            @case('rejected')
                                <span
                                    class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-red-900 dark:text-red-300">Di
                                    Tolak</span>
                            @break

                            @default
                        @endswitch
                    </div>

                    <div class="mb-5">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="default_size">Upload File</label>
                        <input required onchange="return getFileName()" id="default_size" name="file"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="default_size" type="file">
                        <small class="text-red-600">File harus berformat PDF dan tidak boleh lebih dari
                            5MB</small>
                    </div>
                    @if ($data['keterangan'] != null)
                        <div class="mb-5">
                            <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                role="alert">
                                <svg class="shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                
                                <div>
                                    <span class="font-medium">Keterangan : </span>
                                    {!! $data['keterangan'] !!}
                                </div>
                            </div>
                        </div>
                    @endif
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Simpan</button>
                    <a href="{{Route('berkas.index')}}" class="text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:ring-slate-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none dark:focus:ring-slate-800">Kembali</a>
                    </form>
            </div>
        </div>
    </main>
@endsection
