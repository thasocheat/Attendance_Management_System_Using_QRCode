<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QRCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_id', 'qr_code', 'generated_at', 'expiry_time'
    ];

    public function class()
    {
        return $this->belongsTo(ClassModel::class);
    }
}
