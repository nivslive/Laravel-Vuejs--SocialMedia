<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Subject, Message, Reaction};
use Backpack\CRUD\app\Models\Traits\CrudTrait;
class Theme extends Model
{
    use CrudTrait, HasFactory;

    protected $fillable = [
       'title', 'slug', 'description'
    ];
    
    public function reactions()
    {
        return $this->hasManyThrough(Reaction::class, Message::class);
    }
    public function subjects() {
       return $this->hasMany(Subject::class);
    }
}
