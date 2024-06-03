<?php

namespace Database\Seeders;

use App\Models\ClassModel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClassModel::create([
            'subject_id' => 1,
            'teacher_id' => 2,
            'class_name' => 'Math Class',
            'class_code' => 'MATH2021',
        ]);

        ClassModel::create([
            'subject_id' => 2,
            'teacher_id' => 2,
            'class_name' => 'Science Class',
            'class_code' => 'SCI2021',
        ]);
    }
}
