<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Reply extends Model
{
    use HasFactory;

    protected $fillable = ['message', 'user_id', 'message_id'];

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
