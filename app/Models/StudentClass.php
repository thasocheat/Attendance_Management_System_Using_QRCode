<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_id', 'student_id', 'enrollment_date'
    ];

    public function class()
    {
        return $this->belongsTo(ClassModel::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }
}
