<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_id', 'teacher_id', 'class_name', 'class_code'
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function studentsClasses()
    {
        return $this->hasMany(StudentClass::class);
    }

    public function qrCodes()
    {
        return $this->hasMany(QRCode::class);
    }
}
