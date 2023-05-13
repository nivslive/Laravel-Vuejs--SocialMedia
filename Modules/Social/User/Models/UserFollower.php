<?php

namespace Modules\Social\User\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFollower extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'follower_id'];
}
