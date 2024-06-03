<?php

namespace Database\Seeders;

use App\Models\QrCodeModel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class QrCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        QrCodeModel::create([
            'class_id' => 1,
            'qr_code' => 'qr_codes/ClassPhysic001.svg',
            'expiry_time' => now()->addDays(1),
        ]);

        QrCodeModel::create([
            'class_id' => 2,
            'qr_code' => 'qr_codes/KidClass001.svg',
            'expiry_time' => now()->addDays(1),
        ]);
    }
}
