<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subject;
use App\Models\Message;
use App\Models\User;
class Reaction extends Model
{
    protected $fillable = [];
    use HasFactory;

    public function scopeAlreadyLiked($query, $user_id, $message_id) {
        return $query->where('user_id', '=', $user_id)->where('message_id', '=', $message_id);
    }

    public function user() {
        return $this->hasOne(User::class, 'user_id', 'id');
    }

    public function subject() {
        return $this->hasOne(Subject::class, 'subject_id', 'id');
    }

    public function message() {
        return $this->hasOne(Message::class, 'message_id', 'id');
    }
}
