@extends('layouts.users')
@section('content')
    <div class="w-full mt-4">
        <h6 class=" mb-4">Hi 👋 Selamat Datang Kembali, <strong>{{ auth()->user()->name }}</strong></h6>
        <div class="grid lg:grid-cols-2 grid-cols-2 gap-4 mt-4">
            <a href="{{Route('berkas.index')}}" class="menu-card flex flex-col items-center bg-white rounded-lg shadow-lg p-4 hover:bg-blue-100 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M19.903 8.586a.997.997 0 0 0-.196-.293l-6-6a.997.997 0 0 0-.293-.196c-.03-.014-.062-.022-.094-.033a.991.991 0 0 0-.259-.051C13.04 2.011 13.021 2 13 2H6c-1.103 0-2 .897-2 2v16c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2V9c0-.021-.011-.04-.013-.062a.952.952 0 0 0-.051-.259c-.01-.032-.019-.063-.033-.093zM16.586 8H14V5.414L16.586 8zM6 20V4h6v5a1 1 0 0 0 1 1h5l.002 10H6z"></path><path d="M8 12h8v2H8zm0 4h8v2H8zm0-8h2v2H8z"></path></svg>
                <p class="text-center mt-3">Berkas</p>
            </a>
            <a href="{{Route('riwayat-kontrak')}}" class="menu-card flex flex-col items-center bg-white rounded-lg shadow-lg p-4 hover:bg-blue-100 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path><path d="M13 7h-2v5.414l3.293 3.293 1.414-1.414L13 11.586z"></path></svg>
                <p class="text-center mt-3">Riwayat</p>
            </a>
            <a href="{{Route('management-kontrak.index')}}" class="menu-card flex flex-col items-center bg-white rounded-lg shadow-lg p-4 hover:bg-blue-100 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M19 15v-3h-2v3h-3v2h3v3h2v-3h3v-2h-.937zM4 7h11v2H4zm0 4h11v2H4zm0 4h8v2H4z"></path></svg>     
                
                <p class="text-center mt-3">Kontrak</p>
            </a>
            <a href="javascript:void(0)" class="menu-card flex flex-col items-center bg-white rounded-lg shadow-lg p-4 hover:bg-blue-100 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="m10.998 16 5-4-5-4v3h-9v2h9z"></path><path d="M12.999 2.999a8.938 8.938 0 0 0-6.364 2.637L8.049 7.05c1.322-1.322 3.08-2.051 4.95-2.051s3.628.729 4.95 2.051S20 10.13 20 12s-.729 3.628-2.051 4.95-3.08 2.051-4.95 2.051-3.628-.729-4.95-2.051l-1.414 1.414c1.699 1.7 3.959 2.637 6.364 2.637s4.665-.937 6.364-2.637C21.063 16.665 22 14.405 22 12s-.937-4.665-2.637-6.364a8.938 8.938 0 0 0-6.364-2.637z"></path></svg>   
                <p class="text-center mt-3">Keluar</p>
            </a>
        </div>
        <div class="p-2 mt-3 mb-14">
           
            @php
                $dataBerkasPending = $information->where('status', 'pending')->count();
                $dataBerkasApproved = $information->where('status', 'approved')->count();
                $dataBerkasRejected = $information->where('status', 'rejected')->count();
                
            @endphp
             <h2 class="text-xl font-bold">Statistik Berkas</h2>
             <div class=" grid lg:grid-cols-2 grid-cols-2  justify-between mb-3 mt-3 gap-3">
                
                <div class="text-lg bg-white p-3 rounded-xl flex lg:flex-wrap lg:gap-2 gap-3">
                    📂
                    Upload<span class="font-bold ">{{ $information->count() }}</span>
                </div>
                <div class="text-lg bg-white p-3 rounded-xl flex lg:flex-wrap lg:gap-2 gap-3">
                    ⌛
                    Pending<span class="font-bold ">{{ $dataBerkasPending }}</span>
                </div>
                <div class="text-lg  bg-white p-3 rounded-xl flex flex-wrap lg:gap-2 gap-3">
                    ✔
                    Verifikasi<span class="font-bold ">{{ $dataBerkasApproved }}</span>
                </div>
                <div class="text-lg  bg-white p-3 rounded-xl flex flex-wrap lg:gap-2 gap-3">
                    ❌
                    Di Tolak<span class="font-bold ">{{ $dataBerkasRejected }}</span>
                </div>
            
            </div>
            @if ($information->count() == 0)
                <div class="flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                    <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                    <span class="font-medium">Informasi !</span> Saat ini anda belum melakukan pengajuan berkas
                    </div>
                </div>
            @endif
            @if ($dataBerkasApproved == $perizinan)
            <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                  <span class="font-medium">Informasi</span> Selamat Perizinan anda telah memenuhi persyaratan
                </div>
              </div>
            @endif
        </div>
    </div>
@endsection
