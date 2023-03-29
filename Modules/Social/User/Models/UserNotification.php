<?php

namespace Modules\Social\User\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subject;
use App\Models\Message;
use App\Models\User;

class UserNotification extends Model
{
    protected $fillable = [];
    use HasFactory;
    public function user() {
        return $this->hasOne(User::class, 'user_id', 'id');
    }
}
