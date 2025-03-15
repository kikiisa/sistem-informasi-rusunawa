@extends('layouts.admin')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <h1 class="mb-2 text-2xl font-semibold">Berkas Pemohon</h1>
            <div class="flex flex-col gap-3">
                @foreach ($data as $item)
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4 bg-white">
                        <h1 class="font-bold">{{ $item['perizinan_file']->nama_file }}</h1>
                        <div class="stat flex lg:flex-row flex-wrap  mt-2 mb-3">
                            <span
                                class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-sm me-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500 ">
                                <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z" />
                                </svg>
                                Di Upload 3 days ago
                            </span>
                            <div class="status-berkas">
                                Status Berkas : 
                                <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">Pending</span>
                            </div>
                        </div>                        
                        <form class="">
                            <div class="form-group">
                                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Status Berkas</label>
                                <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Pilih Status</option>
                                <option value="pending">Pending</option>
                                <option value="approved">Di Terima</option>
                                <option value="rejected">Di Tolak</option>
                                </select>
                            </div>
                            <div class="form-group">                                
                                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                                <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                            </div>
                            <button type="button" class="mt-4 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Verifikasi</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
