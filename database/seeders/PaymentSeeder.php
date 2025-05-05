<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Payment::create([
            "provider_bni" => "https://simponi.tasikmalayakota.go.id/payment/bni",
            "provider_bri" => "https://simponi.tasikmalayakota.go.id/payment/bri",
            "provider_bsg" => "https://simponi.tasikmalayakota.go.id/payment/bsg",
            "provider_bca" => "https://simponi.tasikmalayakota.go.id/payment/bca",
            "provider_bsi" => "https://simponi.tasikmalayakota.go.id/payment/bsi",
            "provider_mandiri" => "https://simponi.tasikmalayakota.go.id/payment/mandiri",
            "provider_maybank" => "https://simponi.tasikmalayakota.go.id/payment/maybank",
            "provider_mandiri_syariah" => "https://simponi.tasikmalayakota.go.id/payment/mandiri-syariah",
            "qrcode" => "https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=https://simponi.tasikmalayakota.go.id/payment&choe=UTF-8",
       ]);
    }
}
