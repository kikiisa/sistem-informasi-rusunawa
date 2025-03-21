<?php

namespace Database\Seeders;

use App\Models\Kamar;
use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class KamarSeeder extends Seeder
{
   
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            Kamar::create([
                'uuid' => Uuid::uuid4()->toString(),
                'no_kamar' => sprintf('%03d', $i),
                'lt_kamar' => '2',
                'status' => 'tersedia',
                'harga' => '1000000',
                'fasilitas' => 'AC, TV, Kulkas',
                'keterangan' => "Kamar dengan fasilitas AC, TV, dan Kulkas. Kamar ke-{$i}",
            ]);
        }
    }
}
