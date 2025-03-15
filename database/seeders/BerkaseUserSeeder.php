<?php

namespace Database\Seeders;

use App\Models\BerkasUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BerkaseUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BerkasUser::create([
            'id_user' => 1,
            'id_perizinan_file' => 1,
            'berkas' => 'file1.pdf',
            'status' => 'pending',
            'keterangan' => 'keterangan1'
        ]);
    }
}
