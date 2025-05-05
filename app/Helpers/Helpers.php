<?php 

use Illuminate\Support\Carbon;

function expired($awal,$akhir){
    $tanggalMulai = Carbon::parse($awal);
    $tanggalAkhir = Carbon::parse($akhir);
    $hariIni = Carbon::today();
    if ($hariIni->lessThanOrEqualTo($tanggalAkhir)) {
        // Masih aktif
        $sisaHari = $hariIni->diffInDays($tanggalAkhir);
        return "$sisaHari hari lagi";
    } else {
        // Sudah habis
        $selisihHari = $tanggalAkhir->diffInDays($hariIni);
        return "$selisihHari hari lalu";
    }
}

function format_tanggal($date){
    return Carbon::parse($date)->translatedFormat('d F Y');
}

function countMonth($awal,$akhir){
    $tanggalMulai = Carbon::parse($awal);
    $tanggalAkhir = Carbon::parse($akhir);
    $bulan = $tanggalMulai->diffInMonths($tanggalAkhir);
    return "$bulan Bulan";
}
