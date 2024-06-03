<?php

namespace Database\Seeders;

use App\Models\StudentClass;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StudentClass::create([
            'class_id' => 1,
            'student_id' => 3,
            'enrollment_date' => '2022-01-01',
        ]);

        StudentClass::create([
            'class_id' => 2,
            'student_id' => 3,
            'enrollment_date' => '2022-01-01',
        ]);
    }
}
