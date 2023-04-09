<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
        'src',
        'mime_type',
        'description',
        'alt',
    ];

    protected $appends = ['full_image_path'];

    public function getFullImagePathAttribute()
    {
    
        return env('APP_URL') .  '/' . $this->src;
    
    }
}
