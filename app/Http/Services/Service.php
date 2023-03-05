<?php
namespace App\Http\Services;

abstract class Service {
    protected $redisCheck = false;

    protected function setRedisCheck($att) {
        $this->redisCheck = $att;
    }
    protected function redisRules($data, $slug, $part = 'chat') {

        if(!Redis::exists('user:'.$part.':'.$slug)):
            Redis::set('user:'.$part.':'.$slug, json_encode($data));
        endif;

        $subjects = json_decode(Redis::get('user:'.$part.':'.$slug));

        return $subjects;
    }


}
