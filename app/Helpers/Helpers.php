<?php

use Illuminate\Support\Carbon;

// function expired($awal, $akhir)
// {
//     $tanggalMulai = Carbon::parse($awal);
//     $tanggalAkhir = Carbon::parse($akhir);
//     $hariIni = Carbon::today();
//     if ($hariIni->lessThanOrEqualTo($tanggalAkhir)) {
//         // Masih aktif
//         $sisaHari = $hariIni->diffInDays($tanggalAkhir);
//         return $sisaHari;
//     } else {
//         // Sudah habis
//         $selisihHari = $tanggalAkhir->diffInDays($hariIni);
//         return $selisihHari;
//     }
// }

function expired($awal, $akhir)
{
    $startDate = Carbon::parse($awal);
    $endDate = Carbon::parse($akhir);
    $today = Carbon::today();

    if ($today->lte($endDate)) {
        // Masih berlaku
        return $today->diffInDays($endDate);
    } else {
        // Sudah expired, hasil negatif
        return 0;
    }
}
function format_tanggal($date)
{
    return Carbon::parse($date)->translatedFormat('d F Y');
}

function countMonth($awal, $akhir)
{
    $tanggalMulai = Carbon::parse($awal);
    $tanggalAkhir = Carbon::parse($akhir);
    $bulan = $tanggalMulai->diffInMonths($tanggalAkhir);
    return "$bulan Bulan";
}

function get_initials($name)
{
    $parts = explode(' ', $name);
    $initials = '';
    foreach ($parts as $part) {
        $initials .= strtoupper(substr($part, 0, 1));
    }
    return $initials;
}
