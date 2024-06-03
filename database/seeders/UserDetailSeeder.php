<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\UserDetail;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserDetail::create([
            'user_id' => 1,
            'address' => '123 Main St',
            'phone_number' => '123-456-7890',
            'date_of_birth' => '1990-01-01',
            'profile_picture_url' => 'profile_pictures/cCJZYA58JwEuTosXt1NPEJqQMaOC3rzT2yq5QKzY.png',
        ]);

        UserDetail::create([
            'user_id' => 2,
            'address' => '456 Elm St',
            'phone_number' => '987-654-3210',
            'date_of_birth' => '1980-05-15',
            'profile_picture_url' => 'profile_pictures/EuZgol8j3PMX85NRZnh9MtDjilwGxOpd7cwy10Vb.png',
        ]);

        UserDetail::create([
            'user_id' => 3,
            'address' => '789 Oak St',
            'phone_number' => '555-123-4567',
            'date_of_birth' => '2000-09-25',
            'profile_picture_url' => 'profile_pictures/k9WkxTrcj0gvBAFwqXoMJNNWBZMtYpVRjWfBsLDl.png',
        ]);
    }
}
