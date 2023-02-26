<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Message, Reaction, Subject, Chat};
class Dashboard extends Model
{
    use HasFactory;

    public static function all() {
        dd(Chat::all());
    }
}
