<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Message, Chat, User};
class Subject extends Model
{
    use CrudTrait, HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'photo_id',
        'description',
        'chat_id',
        'user_id'
    ];

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function chat() {
        return $this->belongsTo(Chat::class, 'chat_id');
     }

     public function photo()
    {
        return $this->hasOne(Photo::class, 'id', 'photo_id');
    }


    public function messages() {
       return $this->hasMany(Message::class);
    }

}
