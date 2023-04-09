<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectExternalLink extends Model
{
    use HasFactory;
    protected $fillable = [
        'youtube',
        'soundcloud',
        'spotify'
    ];
}
