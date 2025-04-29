@extends('layouts.admin',["title" => "Edit Permohonan"])
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <h1 class="mb-2 text-2xl font-semibold">Berkas Pemohon</h1>
            <div class="flex flex-col gap-3">
                @forelse ($data as $item)
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
                                {{ $item->created_at->diffForHumans() }}
                            </span>
                            <div class="status-berkas">
                                Status Berkas :
                                @switch($item["status"])
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
                        </div>
                        <form action="{{ route('permohonan.update', $item->id) }}" method="POST">
                            @csrf
                            @method("PUT")
                            <div class="form-group">
                                <label for="status"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Status
                                    Berkas</label>
                                <select id="status"
                                    name="status"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>Pilih Status</option>
                                    <option value="pending" @selected($item['status'] == 'pending')>Pending</option>
                                    <option value="approved" @selected($item['status'] == 'approved')>Di Terima</option>
                                    <option value="rejected" @selected($item['status'] == 'rejected')>Di Tolak</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="message"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                                <textarea id="message" name="keterangan" rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Write your thoughts here...">{{ old('keterangan', $item->keterangan) }}</textarea>
                            </div>
                            
                            <button type="submit"
                                class="mt-4 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Verifikasi</button>
                               
                                <button type="button" onclick="showModal('{{ $item->berkas }}')" data-modal-target="static-modal" data-modal-toggle="static-modal" 
                                class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Lihat File</button>    
                              
                        </form>
                    </div>
                @empty
                    <div class="text-start">
                        <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800 w-1/2" role="alert">
                            <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                              <span class="font-medium"> Permohonan Tidak Ditemukan </span>
                            </div>
                          </div>
                        <a  href="{{ route('permohonan.index') }}" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Kembali</a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
  
  <!-- Main modal -->
 
  <script>
      const modal = document.getElementById('static-modal');
      const trigger = document.querySelector('[data-modal-toggle="static-modal"]');
      let frame_pdf = document.querySelector('.frame-pdf');
      let base_url = window.location.origin;
      const showModal = (berkas) => 
      {
          var popupWindow = window.open('', '', 'width=800,height=600,scrollbars=yes');
          popupWindow.document.write("<iframe src='" + base_url + "/data/berkas/" + berkas + "' width='100%' height='100%'></iframe>");
          popupWindow.document.close();
      }
  </script>
@endsection
