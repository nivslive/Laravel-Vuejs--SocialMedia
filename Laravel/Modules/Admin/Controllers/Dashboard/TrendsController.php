<?php
namespace Modules\Admin\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\{Theme, User, Reaction, Message, Subject, Dashboard, Photo, Admin};

class TrendsController extends Controller {

    public function all() {
        return [
            'getLoadAvg' => $this->getLoadAvg(),
            'mostPopularSubjects' => $this->mostPopularSubjects(),
            'activityPeakHours' => $this->activityPeakHours(),
            'mostActiveUsersSinceCreation' => $this->mostActiveUsersSinceCreation(),
            'subjectsWithMostMessagesToday' => $this->subjectsWithMostMessagesTodayWithLimit(),
            'mostActiveUsersInToday' => $this->mostActiveUsersInTimePeriod('today'),
            'mostActiveUsersInWeek' => $this->mostActiveUsersInTimePeriod('week'),
            'mostActiveUsersInMonth' => $this->mostActiveUsersInTimePeriod('month'),
        ];
    }


    public function getLoadAvg() {
        $load = sys_getloadavg();
        $text = "Carga média nos últimos 1, 5 e 15 minutos: " . implode(', ', $load);
        return $text;
    }
    public function mostActiveUsersSinceCreation($limit = 10) {
        $mostActiveUsers = User::withCount(['messages', 'reactions'])
            ->whereHas('messages')
            ->orWhereHas('reactions')
            ->orderByRaw('(messages_count + reactions_count) DESC')
            ->limit($limit)
            ->get();
        
        return $mostActiveUsers;
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

    public function mostPopularSubjects($timeRange = '24 hours', $limit = 10) {
        $startTime = Carbon::now()->sub($timeRange);
        $mostPopularSubjects = Subject::withCount('messages')
            ->whereHas('messages', function ($query) use ($startTime) {
                $query->where('created_at', '>', $startTime);
            })
            ->orderBy('messages_count', 'DESC')
            ->limit($limit)
            ->get();
        return $mostPopularSubjects;
    }

    public function activityPeakHours($timeRange = '24 hours', $interval = 30) {
        $startTime = Carbon::now()->sub($timeRange);
        $endTime = Carbon::now();
        $timeRangeMinutes = $endTime->diffInMinutes($startTime);
        $numIntervals = ceil($timeRangeMinutes / $interval);
        $peakHours = [];
    
        for ($i = 0; $i < $numIntervals; $i++) {
            $intervalStartTime = $startTime->copy()->addMinutes($i * $interval);
            $intervalEndTime = $intervalStartTime->copy()->addMinutes($interval);
            $numMessages = Message::whereBetween('created_at', [$intervalStartTime, $intervalEndTime])->count();
            $peakHours[] = [
                'start_time' => $intervalStartTime,
                'end_time' => $intervalEndTime,
                'num_messages' => $numMessages
            ];
        }
    
        usort($peakHours, function ($a, $b) {
            return $b['num_messages'] - $a['num_messages'];
        });
    
        return $peakHours;
    }

    public function mostActiveUsersInTimePeriod($timePeriod = 'today', $limit = 10) {
        $now = Carbon::now();
        switch($timePeriod) {
            case 'today':
                $startTime = Carbon::today();
                break;
            case 'week':
                $startTime = Carbon::now()->startOfWeek();
                break;
            case 'month':
                $startTime = Carbon::now()->startOfMonth();
                break;
            default:
                $startTime = Carbon::today();
                break;
        }
        
        $mostActiveUsers = User::withCount(['messages', 'reactions'])
            ->whereHas('messages', function ($query) use ($startTime, $now) {
                $query->whereBetween('created_at', [$startTime, $now]);
            })
            ->orWhereHas('reactions', function ($query) use ($startTime, $now) {
                $query->whereBetween('created_at', [$startTime, $now]);
            })
            ->orderByRaw('(messages_count + reactions_count) DESC')
            ->limit($limit)
            ->get();

        return $mostActiveUsers;
    }
}