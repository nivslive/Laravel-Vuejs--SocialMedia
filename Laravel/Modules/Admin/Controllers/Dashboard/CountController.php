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
            
            //lastday
            'themes_lastday' => $this->themesLastDay(),
            'users_lastday' => $this->usersLastDay(),
            'subjects_lastday' => $this->subjectsLastDay(),
            'messages_lastday' => $this->messagesLastDay(),
            
            //lastweek
            'themes_lastweek' => $this->themesLastWeek(),
            'users_lastweek' => $this->usersLastWeek(),
            'subjects_lastweek' => $this->subjectsLastWeek(),
            'messages_lastweek' => $this->messagesLastWeek(),
        ];
    }

    ////////////////////////////////////////////////////////////////////////////////////////

    //CONDITION LASTWEEK
    public function week() {
        return \Carbon\Carbon::now()->subDays(30);
    }

    //LASTWEEK
    public function themesLastWeek() {
        return Theme::where('created_at', '>=', $this->week())->count();
    }
    public function usersLastWeek() {
        return User::where('created_at', '>=', $this->week())->count();
    }

    public function subjectsLastWeek() {
        return Subject::where('created_at', '>=', $this->week())->count();
    }

    public function messagesLastWeek() {
        return Message::where('created_at', '>=', $this->week())->count();   
    }


    /////////////////////////////////////////////////////////////////////////////////////


    //CONDITION LASTDAY
    public function today() {
        return \Carbon\Carbon::now()->subDays(1);
    }

    // LASTDAY
    public function themesLastDay() {
        return Theme::where('created_at', '>=', $this->today())->count();
    }
    public function usersLastDay() {
        return User::where('created_at', '>=', $this->today())->count();
    }

    public function subjectsLastDay() {
        return Subject::where('created_at', '>=', $this->today())->count();
    }

    public function messagesLastDay() {
        return Message::where('created_at', '>=', $this->today())->count();   
    }


    //////////////////////////////////////////////////////////////////////////////////////

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