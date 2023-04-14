<?php
namespace Modules\Admin\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\{Theme, User, Reaction, Message, Subject, Dashboard, Photo, Admin};

class CountController extends Controller {


    public function all() {
        return [
            'users' => $this->users(),
            'subjects' => $this->subjects(),
            'themes' => $this->themes(),
            'messages' => $this->messages(),
            'admins' => $this->admins(),
        ];
    }

    public function users() {
        return User::all()->count();
    }

    public function subjects() {
        return Subject::all()->count();
    }

    public function themes() {
        return Theme::all()->count();
    }


    public function admins() {
        return Admin::all()->count();
    }

    public function messages() {
        return Message::all()->count();   
    }

}