@extends('layouts.users')
@section('content')
    <main class="flex flex-col items-center justify-center gap-4 mt-3">
        <div class="w-full">
            <div class="content bg-white shadow-xl p-3 rounded-2xl">
                <div class="title mb-3">
                    <div class="flex flex-row gap-2">
                        <h1 class="font-bold">Unggah Berkas {{ $data->nama_file }}</h1>
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

                <form action="{{ route('berkas.store') }}" enctype="multipart/form-data"
                    method="post">
                    @csrf
                    @method('POST')
                    <input type="text" name="id_perizinan" hidden value="{{ $data->id }}" name="id">
                    <div class="mb-5">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="default_size">Upload File</label>
                        <input required onchange="return getFileName()" id="default_size" name="file"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="default_size" type="file">
                        <small class="text-red-600">File harus berformat PDF dan tidak boleh lebih dari
                            5MB</small>
                    </div>
                    
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Simpan</button>
                </form>
            </div>
        </div>
    </main>
@endsection
