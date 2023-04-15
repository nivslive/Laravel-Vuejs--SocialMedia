<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\{Route, Auth};
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function isLogged($dependency) {

        $logged =  [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'user' => Auth::user(),
        ];
        #dd($logged);
        return array_merge($dependency, $logged);
    }
}
