<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subject::create([
            'name' => 'Mathematics',
            'code' => 'MATH101',
            'description' => 'Basic Mathematics',
        ]);

        Subject::create([
            'name' => 'Science',
            'code' => 'SCI101',
            'description' => 'Basic Science',
        ]);
    }
}
