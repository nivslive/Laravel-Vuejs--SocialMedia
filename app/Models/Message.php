<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subject;
use App\Models\User;
class Message extends Model
{
    protected $fillable = ['message', 'user_id', 'subject_id'];
    use HasFactory, CrudTrait;

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function subject() {
        return $this->belongsToMany(Subject::class, 'subject_id', 'id');
    }
}
