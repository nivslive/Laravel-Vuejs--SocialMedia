<?php
namespace Modules\Admin\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\{Theme, User, Reaction, Message, Subject, Dashboard, Photo, Admin};

class TrendsController extends Controller {


    public function all() {
        return [
            'subjectsWithMostMessagesTodayLIMIT10' => $this->subjectsWithMostMessagesTodayWithLimit(),
        ];
    }
    
    public function subjectsWithMostMessagesTodayWithLimit($limit = 10) {
        $totalMessagesToday = Message::whereDate('created_at', Carbon::today())->count();
        $subjectsWithMostMessagesToday = Subject::withCount('messages')
            ->whereHas('messages', function ($query) {
                $query->whereDate('created_at', Carbon::today());
            })
            ->orderBy('messages_count', 'DESC')
            ->limit($limit)
            ->get();
    
        foreach ($subjectsWithMostMessagesToday as $subject) {
            $percentage = ($subject->messages_count / $totalMessagesToday) * 100;
            $subject->percentage = $percentage;
        }
    
        return $subjectsWithMostMessagesToday;
    }

}