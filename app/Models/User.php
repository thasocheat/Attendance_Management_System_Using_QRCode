<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'email',
        'password',
        'role',
    ];

    public function classes()
    {
        return $this->hasMany(ClassModel::class, 'teacher_id');
    }

    public function qrClasses()
    {
        return $this->belongsToMany(ClassModel::class, 'student_classes', 'student_id', 'class_id');
    }

    public function studentClasses()
    {
        return $this->hasMany(StudentClass::class, 'student_id');
    }

    public function userDetails()
    {
        return $this->hasOne(UserDetail::class);
    }

    public function isAdmin()
    {
        return $this->role === 'admin'; // Assuming you have a 'role' column in your users table
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
