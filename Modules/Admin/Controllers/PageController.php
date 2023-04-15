<?php
namespace Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use Modules\Admin\Controllers\Dashboard\{CountController, TrendsController};
use App\Models\{Theme, User, Reaction, Message, Subject, Dashboard, Photo};
class PageController extends Controller {

    

    public function dashboard() {
        $count = new CountController;
        $trends = new TrendsController;
        $data = ['count' => [$count->all()], 'trends' => $trends->all()];
        return view('admin.dashboard', compact('data'));
    }

    public function themes() {
        return Theme::with('subjects', 'subjects.user')->get();
    }

    public function subjects() {
        return Subject::all();
    }

    public function messages() {
        return Message::all();
    }
}