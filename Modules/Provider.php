<?php

namespace Modules;

use Illuminate\Support\ServiceProvider;
use Modules\Social\Chat\Provider as Chat;
use Modules\Social\Message\Provider as Message;
use Modules\Social\Subject\Provider as Subject;
class Provider extends ServiceProvider
{
    public function register()
    {
        $this->app->register(Chat::class);
        $this->app->register(Message::class);
        $this->app->register(Subject::class);
    }

    public function boot()
    {
        // código de inicialização do módulo
    }
}
