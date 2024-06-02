<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'address', 'phone_number', 'date_of_birth', 'profile_picture_url'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
