<?php

namespace Modules;

use Database\Factories\ReactionTypeFactory;
use Illuminate\Support\ServiceProvider;


//social
use Modules\Social\Theme\Provider as Theme;
use Modules\Social\Message\Provider as Message;
use Modules\Social\Reaction\Models\ReactionType;
use Modules\Social\Subject\Provider as Subject;
use Modules\Social\Reaction\Provider as Reaction;
use Modules\Social\User\Provider as User;

//admin
use Modules\Social\Admin\Provider as Admin;

class Provider extends ServiceProvider
{
    public function register()
    {

        //admin
        $this->app->register(Admin::class);

        //social
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
