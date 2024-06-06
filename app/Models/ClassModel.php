<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;

    protected $table = 'classes';

    protected $fillable = [
        'subject_id', 'teacher_id', 'class_name', 'class_code'
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class, 'class_id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function studentsClasses()
    {
        return $this->hasMany(StudentClass::class, 'class_id');
    }

    public function qrCodes()
    {
        return $this->hasMany(QrCodeModel::class, 'class_id');
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'student_classes', 'class_id', 'student_id');
    }
}
