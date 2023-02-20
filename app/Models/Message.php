<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subject;
class Message extends Model
{
    use HasFactory;

    public function subject() {
        return $this->belongsToMany(Subject::class, 'subject_id', 'id');
    }
}
