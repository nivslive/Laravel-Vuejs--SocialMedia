<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subject;
class Chat extends Model
{
    use HasFactory, CrudTrait;

    protected $fillable = [
       'title', 'slug', 'description'
    ];

    public function subjects() {
       return $this->hasMany(Subject::class);
    }
}
