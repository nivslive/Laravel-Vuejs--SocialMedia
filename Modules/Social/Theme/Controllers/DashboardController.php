<?php


namespace Modules\Social\Theme\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Reaction, Message, Theme, Subject, Dashboard};
use App\Http\Services\ThemeService;
use Inertia\Inertia;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class DashboardController extends Controller
{
    private ThemeService $service;
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */


    private string $modelTopOf;

    public function __construct() {
        $this->service = new ThemeService;
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

    public function topOfTheme() {
        $date = $this->date($this->getModelTopOf());
        $result = Theme::with(['subjects' => function($query) use ($date) {
            $query->withCount('messages');
            $query->where('created_at', '>=', $date);
            $query->limit(10);
            $query->with(['messages' => function($query) {
                $query->withCount('reactions');
                $query->orderBy('reactions_count', 'desc');
                $query->limit(10);
            }, 'messages.user']);
        }, 'subjects.messages', 'subjects.user'])->withCount('subjects')->get();
        
        $count = $result->reduce(function($carry, $theme) {
            $carry['subjects_count'] += $theme->subjects_count;
            $carry['messages_count'] += $theme->subjects->sum('messages_count');
            $carry['reactions_count'] += $theme->subjects->flatMap(function($subject) {
                return $subject->messages->pluck('reactions_count');
            })->sum();
        
            // Adicione as informações de contagem em cada theme e assunto
            $theme['messages_count'] = $theme->subjects->sum('messages_count');
            $theme['reactions_count'] = $theme->subjects->flatMap(function($subject) {
                return $subject->messages->pluck('reactions_count');
            })->sum();
        
            $theme['subjects']->map(function($subject) {
                $subject['messages_count'] = $subject->messages_count;
                $subject['messages'] = $subject['messages']->map(function($message) {
                    $message['liked'] = isset($message['user']) && Auth()->user() !== null && Auth()->user()->id === $message['user']['id'] ? 1 : 0;
                });
                $subject['messages']->sortByDesc('reactions_count');
                $subject['reactions_count'] = $subject->messages->sum('reactions_count');
                $subject['reactions_and_messages_count'] = $subject['messages_count'] + $subject['reactions_count'];
                return $subject;
            });
            $theme['subjects']->sortByDesc('reactions_and_messages_count');
            $carry['top3'][] = $theme->toArray()->splice(0, 2)->flatten();
            $carry['toplefts'][] = $theme->toArray()->splice(2, 18)->flatten();
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
        }, 'user', 'theme'])
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
        $result = $result->sortByDesc('reactions_and_messages_count');
        $count = [
            'subjects_count' => $result->count(),
            'messages_count' => $result->sum('messages_count'),
            'reactions_count' => $result->sum('reactions_count'),
            'top3' => collect($result)->splice(0, 3)->flatten()->toArray(),
            'toplefts' => collect($result)->splice(3, 23)->flatten()->toArray(),
            'randoms' => collect($result)->splice(0, 23)->flatten()->toArray(),
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

            $data = $arr;

        return view('social.dashboard', ['data' => $data, 'categories' => $this->categories()]);
        }
        else {
            return redirect('/');
        }
        /*if($model === 'theme') {
            $data = $this->topOfTheme();
        }

        if($model === 'subject') {
           $data = $this->topOfSubject();
        }*/
    }


    public function categories() {
        return Theme::select(['slug', 'title'])->limit(5)->get()->toArray();
    }

    public function room($theme, $subject) {
        return Inertia::render('Room',
            $this->isLogged([
            'room' => $this->service->room($theme, $subject)
        ]));
    }

    public function rooms($slug) {
        return Inertia::render('Welcome',
            $this->isLogged([
                'variations' => $this->service->onlyThemeVariations(),
                'theme' => Theme::where('slug', '=', $slug)->first(),
                'id' => $this->service->rooms($slug),
        ]));
    }

}
