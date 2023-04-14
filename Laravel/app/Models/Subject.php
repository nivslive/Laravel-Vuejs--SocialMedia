<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Message, Theme, User, SubjectExternalLink};
class Subject extends Model
{
    use CrudTrait, HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'photo_id',
        'description',
        'theme_id',
        'user_id'
    ];

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function theme() {
        return $this->belongsTo(Theme::class, 'theme_id');
     }

     public function photo()
    {
        return $this->hasOne(Photo::class, 'id', 'photo_id');
    }

    public function links() {
        return $this->hasOne(SubjectExternalLink::class, 'id', 'subject_external_link_id');
    }

    public function messages() {
       return $this->hasMany(Message::class);
    }

}
