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


    private string $modelTopOf;

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


    public function date($date = 'day') {
        switch($date) {
            case('day'):
                $result = Carbon::now()->subDays(1);
                break;
            case('week'):
                $result = Carbon::now()->subDays(7);
                break;
            case('month'):
                $result = Carbon::now()->subDays(30);
                break;
            case('year'):
                $result = Carbon::now()->subDays(340);
                break;
            default:
                $result = Carbon::now();
        }
        return $result->format("Y-m-d H:i:s");
    }

    public function topOfChat() {
        $date = $this->date($this->getModelTopOf());
        $result = Chat::with(['subjects' => function($query) use ($date) {
            $query->withCount('messages');
            $query->where('created_at', '>=', $date);
            $query->limit(10);
            $query->with(['messages' => function($query) {
                $query->withCount('reactions');
                $query->orderBy('reactions_count', 'desc');
                $query->limit(10);
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
                $subject['messages'] = $subject['messages']->map(function($message) {
                    $message['liked'] = isset($message['user']) && Auth()->user() !== null && Auth()->user()->id === $message['user']['id'] ? 1 : 0;
                });
                $subject['messages']->sortByDesc('reactions_count');
                $subject['reactions_count'] = $subject->messages->sum('reactions_count');
                $subject['reactions_and_messages_count'] = $subject['messages_count'] + $subject['reactions_count'];
                return $subject;
            });
            $chat['subjects']->sortByDesc('reactions_and_messages_count');
            $carry['data'][] = $chat->toArray();
            return $carry;
        }, ['subjects_count' => 0, 'messages_count' => 0, 'reactions_count' => 0, 'data' => []]);

        return $count;
    }
    

    public function topOfSubject() {
        $date = $this->date($this->getModelTopOf());
        $result = Subject::with(['messages' => function($query) {
            $query->with('user');
            $query->withCount('reactions');
            $query->orderBy('reactions_count', 'desc');
            $query->limit(10); 
        }, 'user', 'chat'])
        ->where('created_at', '>=', $date)
        ->get();
        
        // Adicione as informações de contagem em cada assunto
        $result->map(function($subject) {
            $subject['messages_count'] = $subject->messages->count();
            $subject['reactions_count'] = $subject->messages->sum('reactions_count');
            $subject['reactions_and_messages_count'] = $subject['messages_count'] + $subject['reactions_count'];
            $subject['messages']->map(function($message) {
                $message['liked'] = isset($message['user']) && Auth()->user() !== null && Auth()->user()->id === $message['user']['id'] ? 1 : 0;
            });
            $subject['messages']->sortByDesc('reactions_count');
            return $subject;
        });
        
        $count = [
            'subjects_count' => $result->count(),
            'messages_count' => $result->sum('messages_count'),
            'reactions_count' => $result->sum('reactions_count'),
            'data' => $result->sortByDesc('reactions_and_messages_count')->toArray(),
        ];
        
        return $count;
    }
    
    

    public function getModelTopOf() {
        return $this->modelTopOf;
    }

    public function setModelTopOf($model) {
        $this->modelTopOf = $model;
    }

    
    
    public function topOf($date = 'all', $model = 'subject') {

        $this->setModelTopOf($date);
        

        if($date === 'all') {
            
            $arr = ['day' => null, 'month' => null, 'year' => null];
            $this->setModelTopOf('day');
            $arr['day'] = $this->topOfSubject();
            $this->setModelTopOf('month');
            $arr['month'] = $this->topOfSubject();
            $this->setModelTopOf('year');
            $arr['year'] = $this->topOfSubject();
            dd($arr);
        }

        if($model === 'chat') {
            dd($this->topOfChat());
        }

        if($model === 'subject') {
            dd($this->topOfSubject());
        }
/*

        $result = Chat::with(['subjects' => function($query) use ($date) {
            $query->withCount('messages');
            $query->where('created_at', '>=', $date);
            $query->limit(10);
            $query->with(['messages' => function($query) {
                $query->withCount('reactions');
                $query->orderBy('reactions_count', 'desc');
                $query->limit(10);
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
                $subject['messages'] = $subject['messages']->map(function($message) {
                    $message['liked'] = isset($message['user']) && Auth()->user() !== null && Auth()->user()->id === $message['user']['id'] ? 1 : 0;
                });
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
*/
    }


    public function topOfDay() {
        return $this->topOf('year');
    }
    public function topOfWeek() {
        return $this->topOf('week');
    }
    public function topOfMonth() {
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
