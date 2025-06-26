<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Document</title>
</head>
<style>
</style>

<body>
    <div class="text-center">
        <div class="flex flex-row justify-center gap-4 items-center">
            <img width="80"
                src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0c/LOGO_KOTA_GORONTALO.png/1056px-LOGO_KOTA_GORONTALO.png"
                class="mt-3 relative top-2">
            <div class="header-cop relative top-2">
                <h1 class="mb mt-4 text-xl space-x-2.5">
                    PEMERINTAHAN KOTA GORONTALO
                </h1>
                <h2>DINAS PERUMAHAN RAKYAT DAN KAWASAN PERMUKIMAN</h2>
                <span class="text-xs">Jl. Jend. Sudirman No. 64 Kota Gorontalo Telp. (0435) 824795</span>
            </div>
        </div>
        <div class="garis lg:w-1/2 mx-auto mt-4">
            <div class="h-1 mt-3  bg-slate-900 "></div>
            <hr class="mt-2 absolute top-2">
            <hr class="mt-1">
        </div>
        <table class=" w-1/2 mx-auto mt-4 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
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

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>
