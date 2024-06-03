<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_id', 'qr_code', 'expiry_time'
    ];

    protected $dates = [
        'expiry_time',
    ];

    public function class()
    {
        return $this->belongsTo(ClassModel::class);
    }
}
