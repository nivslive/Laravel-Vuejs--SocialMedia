<?php

namespace Modules;

use Database\Factories\ReactionTypeFactory;
use Illuminate\Support\ServiceProvider;
use Modules\Bot\Theme\Provider as Theme;
use Modules\Bot\Message\Provider as Message;
use Modules\Bot\User\Provider as User;
class Provider extends ServiceProvider
{
    public function register()
    {
        $this->app->register(Theme::class);
        $this->app->register(User::class);
        $this->app->register(Message::class);
    }

    public function boot()
    {
        $this->app['db']->setDefaultConnection('bot-db');
    }
}
