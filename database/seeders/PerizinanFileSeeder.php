<?php

namespace Database\Seeders;

use App\Models\PerizinanFile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class PerizinanFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        for ($i = 1; $i <= 5; $i++) {
            PerizinanFile::create([
                'uuid' => Uuid::uuid4()->toString(),
                'nama_file' => "Perizinan File $i",
                'deskripsi' => "Perizinan File $i",
                
            ]);
        }
    }
}
