<?php

namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\{Chat, Message, Reaction, Subject, User};

class ChatTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_should_be_room_post_200()
    {
        $response = $this->get('/room/post');
        $response->assertStatus(200);
    }

    public function test_should_be_subject_post_200()
    {
        $response = $this->get('/subject/post');
        $response->assertStatus(200);
    }

    public function test_should_be_message_post_200()
    {
        $response = $this->get('/message/post');
        $response->assertStatus(200);
    }

    public function test_should_be_save_chat_with_success()
    {
        $chat = Chat::factory()->create();
        $this->assertTrue($chat->exists);
    }

    public function test_should_be_save_chat_and_return_data_with_success()
    {
        $chat = Chat::factory()->create(['title' => 'Testando!']);
        $this->assertTrue($chat->title === 'Testando!');
    }

    public function test_should_be_save_subject_with_success()
    {
        $user = User::factory()->create();
        $chat = Chat::factory()->create();
        $subject = Subject::factory()->create([
            'chat_id' => $chat->id, 'user_id' => $user->id
        ]);  
        $this->assertTrue($subject->exists);
    }

 
    public function test_should_be_save_subject_and_return_data_with_success()
    {
        $user = User::factory()->create();
        $chat = Chat::factory()->create();
        $subject = Subject::factory()->create([
            'chat_id' => $chat->id, 'user_id' => $user->id, 'title' => 'Test!', 'description' => 'Test!'
        ]);     
        $this->assertTrue($subject->title === 'Test!');
        $this->assertTrue($subject->description === 'Test!');
    }



     
    public function test_should_be_save_message_with_success()
    {
        $user = User::factory()->create();
        $chat = Chat::factory()->create();
        $subject = Subject::factory()->create(['chat_id' => $chat->id, 'user_id' => $user->id]);
        $message = Message::factory()->create(['subject_id' => $subject->id, 'user_id' => $user->id, ]);
        $this->assertTrue($message->exists);
    }


    public function test_should_be_save_message_and_return_data_with_success()
    {
        $user = User::factory()->create();
        $chat = Chat::factory()->create();
        $subject = Subject::factory()->create(['chat_id' => $chat->id, 'user_id' => $user->id]);
        $message = Message::factory()->create([
            'subject_id' => $subject->id, 'user_id' => $user->id, 
            'message' => 'Testando o uso de salvamento de mensagens!'
        ]);
        $this->assertTrue($message->message === "Testando o uso de salvamento de mensagens!");
    }


    public function test_should_be_save_reactions_with_success() {
        $user = User::factory()->create();
        $chat = Chat::factory()->create();
        $subject = Subject::factory()->create([
            'chat_id' => $chat->id, 'user_id' => $user->id
        ]);
        $message = Message::factory()->create(['subject_id' => $subject->id, 'user_id' => $user->id, ]);
        $reaction = Reaction::factory()->create(['type' => 'like', 'subject_id' => $subject->id, 'message_id' => $message->id, 'user_id' => $user->id]);
        $this->assertTrue($reaction->exists);
    }



    public function test_should_be_save_reactions_and_return_data_with_success() {
        $user = User::factory()->create();
        $chat = Chat::factory()->create();
        $subject = Subject::factory()->create([
            'chat_id' => $chat->id, 'user_id' => $user->id
        ]);
        $message = Message::factory()->create(['subject_id' => $subject->id, 'user_id' => $user->id, ]);
        $reaction = Reaction::factory()->create(['type' => 'like', 'subject_id' => $subject->id, 'message_id' => $message->id, 'user_id' => $user->id]);
        $this->assertTrue($reaction->subject_id === $subject->id);
        $this->assertTrue($reaction->type === 'like');
    }
    
    /*
    public function test_should_be_save_10_messages_and_reactions_and_return_data_with_success() {
        $user = User::factory()->create();
        $chat = Chat::factory()->create();
        $subject = Subject::factory()->create([
            'chat_id' => $chat->id, 'user_id' => $user->id
        ]);
        $message = Message::factory()->count(10)->make();
        var_dump($message);
        $this->assertDatabaseCount($message, 10);
    }
*/




}
