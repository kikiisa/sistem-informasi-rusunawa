<?php

namespace Database\Seeders;

use App\Models\Operator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class OperatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Operator::create([
            'uuid' => Uuid::uuid4()->toString(),
            'name' => 'Operator 1',
            'email' => 'admin@gmail.com',
            'avatar' => null,
            'phone' => '08123456789',
            'role' => 'admin',
            'password' => bcrypt('admin123'),
        ]);
    }
}
