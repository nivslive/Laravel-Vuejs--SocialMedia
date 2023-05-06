<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\{Theme, Message, Reaction, Reply, Subject, User};

class RepliesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_should_be_able_create_replies()
    {


        $user = User::factory()->create();
        //dd($user->id);
        // create theme
        $themeCreated = Theme::create([
            'title' => 'testing',
            'slug' => 'testing',
            'description' => 'testando.',
            'subjects_all_messages_count' => '0', 
        ]);
        // inside theme, create subject
        // $table->string('title');
        // $table->string('slug')->nullable();
        // $table->string('description')->nullable();
        $subjectCreated = Subject::create([
            'title' => 'testing',
            'slug' => 'testing',
            'theme_id' => $themeCreated->id,
            'user_id' => $user->id,
        ]);
        // inside subject, create message
        $messageCreated = Message::create([
            'message' => 'test',
            'subject_id' => $subjectCreated->id,
            'user_id' => $user->id,
        ]);
        //dd($messageCreated);
        // inside message, create reply
        $replyCreated = Reply::create([
            'message' => 'test',
            'user_id' => $user->id, 
            'message_id' => $messageCreated->id,
        ]);

        $this->assertTrue($replyCreated->message === 'test');
        // success!!
    }

    public function test_should_be_able_edit_replies()
    {
        // create theme
        // inside theme, create subject
        // inside subject, create message
        // inside message, create reply
        // edit reply
        // success!!
    }


    public function test_should_be_able_delete_replies()
    {
        // create theme
        // inside theme, create subject
        // inside subject, create message
        // inside message, create reply
        // delete reply
        // success!!
    }

    public function test_should_be_able_other_user_like_reply()
    {
        // create theme
        // inside theme, create subject
        // inside subject, create message
        // inside message, create reply
        // other user like that reply
        // success!!
    }
}
