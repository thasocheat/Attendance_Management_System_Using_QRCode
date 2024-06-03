<?php

namespace Database\Seeders;

use App\Models\Attendance;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Attendance::create([
            'student_class_id' => 1,
            'date' => '2022-02-01',
            'status' => 'absent',
        ]);

        Attendance::create([
            'student_class_id' => 2,
            'date' => '2022-02-01',
            'status' => 'absent',
        ]);
    }
}
