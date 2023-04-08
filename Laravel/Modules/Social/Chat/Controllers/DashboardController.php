<?php


namespace Modules\Social\Chat\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Reaction, Message, Chat, Subject, Dashboard};
use App\Http\Services\ChatService;
use Inertia\Inertia;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class DashboardController extends Controller
{
    private ChatService $service;
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */

    public function __construct() {
        $this->service = new ChatService;
    }

    public function json($data, $status) {
        return response()->json(['data' => $data, 'status' => $status]);
    }

    public function query($sql) {
        $sql = file_get_contents(__DIR__."/sql/dashboard/$sql.sql");
        return DB::select($sql);
    }

    public function all() {
        return $this->query(__FUNCTION__);
    }

    public function topOf($date = 'day') {
        switch($date) {
            case('day'):
                $date = Carbon::now()->subDays(1);
                break;
            case('week'):
                $date = Carbon::now()->subDays(7);
                break;
            case('month'):
                $date = Carbon::now()->subDays(30);
                break;
            case('year'):
                $date = Carbon::now()->subDays(340);
                break;
        }
        $result = Chat::with(['subjects' => function($query) use ($date) {
            $query->withCount('messages');
            $query->where('created_at', '>=', $date);
            $query->with(['messages' => function($query) {
                $query->withCount('reactions');
            }, 'messages.user']);
        }, 'subjects.messages', 'subjects.user'])->withCount('subjects')->get();
        
        $count = $result->reduce(function($carry, $chat) {
            $carry['subjects_count'] += $chat->subjects_count;
            $carry['messages_count'] += $chat->subjects->sum('messages_count');
            $carry['reactions_count'] += $chat->subjects->flatMap(function($subject) {
                return $subject->messages->pluck('reactions_count');
            })->sum();
        
            // Adicione as informações de contagem em cada chat e assunto
            $chat['messages_count'] = $chat->subjects->sum('messages_count');
            $chat['reactions_count'] = $chat->subjects->flatMap(function($subject) {
                return $subject->messages->pluck('reactions_count');
            })->sum();
        
            $chat['subjects']->map(function($subject) {
                $subject['messages_count'] = $subject->messages_count;
                $subject['messages']->sortByDesc('reactions_count');
                $subject['reactions_count'] = $subject->messages->sum('reactions_count');
                $subject['reactions_and_messages_count'] = $subject['messages_count'] + $subject['reactions_count'];
                return $subject;
            });
            $chat['subjects']->sortByDesc('reactions_and_messages_count');
            $carry['data'][] = $chat->toArray();
            return $carry;
        }, ['subjects_count' => 0, 'messages_count' => 0, 'reactions_count' => 0, 'data' => []]);
        
        dd($count);

    }


    public function topOfDay() {
        return $this->topOf('day');
    }
    public function topOfWeek() {
        return $this->topOf('week');
    }

    

    public function categories() {
        return Chat::all();
    }

    public function room($chat, $subject) {
        return Inertia::render('Room',
            $this->isLogged([
            'room' => $this->service->room($chat, $subject)
        ]));
    }

    public function rooms($slug) {
        return Inertia::render('Welcome',
            $this->isLogged([
                'variations' => $this->service->onlyChatVariations(),
                'chat' => Chat::where('slug', '=', $slug)->first(),
                'id' => $this->service->rooms($slug),
        ]));
    }

}
