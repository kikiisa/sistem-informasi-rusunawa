<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>SIPR</title>
</head>

<body>
    <x-navbar />
    <section class=" dark:bg-gray-900 bg-white mt-12 lg:w-1/2 mx-auto">

        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <h1 class="text-2xl font-bold text-gray-800 mb-3 dark:text-white">Detail Kamar
                <strong>{{ $data->no_kamar }}</strong></h1>

            <table class="w-full text-sm text-left mb-6 ">
                <tbody>
                    <tr>
                        <td class="font-semibold text-gray-700 dark:text-white w-40">Nomor Kamar</td>
                        <td>: {{ $data->no_kamar }}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold text-gray-700 dark:text-white">Lantai</td>
                        <td>: {{ $data->lt_kamar }}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold text-gray-700 dark:text-white">Fasilitas</td>
                        <td>: {{ $data->fasilitas }}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold text-gray-700 dark:text-white">Harga Sewa</td>
                        <td>: <span class="text-green-600 font-semibold">Rp
                                {{ number_format($data->harga, 0, ',', '.') }}</span> / Bulan</td>
                    </tr>
                    <tr>
                        <td class="font-semibold text-gray-700 dark:text-white">Status</td>
                        <td>
                            : <span
                                class="font-semibold {{ $data->status === 'tersedia' ? 'text-green-600' : 'text-red-600' }}">
                                {{ ucfirst($data->status) }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="font-semibold text-gray-700 dark:text-white align-top">Keterangan</td>
                        <td>: {{ $data->keterangan }}</td>
                    </tr>
                </tbody>
            </table>
            
            <a href="{{ route('home') }}" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
              Kembali
            </a>
            
        </div>
    </section>
</body>

</html>
