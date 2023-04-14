<?php

namespace Modules;

use Database\Factories\ReactionTypeFactory;
use Illuminate\Support\ServiceProvider;
use Modules\Social\Theme\Provider as Theme;
use Modules\Social\Message\Provider as Message;
use Modules\Social\Reaction\Models\ReactionType;
use Modules\Social\Subject\Provider as Subject;
use Modules\Social\Reaction\Provider as Reaction;
use Modules\Social\User\Provider as User;
class Provider extends ServiceProvider
{
    public function register()
    {
        $this->app->register(Theme::class);
        $this->app->register(Message::class);
        $this->app->register(Subject::class);
        $this->app->register(Reaction::class);
        $this->app->register(User::class);
    }

    public function boot()
    {
        //
    }
}
