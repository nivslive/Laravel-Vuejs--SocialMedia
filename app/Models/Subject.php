<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Message;
use App\Models\Chat;
class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'chat_id',
        'user_id'
    ];

    public function chat() {
        return $this->hasOne(Chat::class, 'id');
     }
    public function messages() {
       return $this->hasMany(Message::class);
    }
}
