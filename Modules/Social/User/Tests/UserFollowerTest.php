<?php

namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Modules\Social\User\Models\UserFollower;
use Tests\TestCase;
use App\Models\{Theme, Message, Reaction, Subject, User};
use Modules\Social\Reaction\Database\Factories\{ReactionFactory, ReactionTypeFactory};
use Database\Seeders\DatabaseSeeder;
class UserFollowerTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_should_be_able_to_follow_a_user()
    {
        $follower = User::factory()->create();
        $user = User::factory()->create();  
        $this->actingAs($user);
        //dd($follower->id);
        $userFollower = UserFollower::create([
            'user_id' => $user->id,
            'follower_id' => $follower->id,
        ]);
        $this->assertEquals($userFollower->user_id, $user->id);
        $this->assertEquals($userFollower->follower_id, $userFollower->id);
    }


    public function test_should_be_able_to_unfollow_a_user()
    {
        $follower = User::factory()->create();
        $user = User::factory()->create();  
        $this->actingAs($user);
        //dd($follower->id);
        $userFollower = UserFollower::create([
            'user_id' => $user->id,
            'follower_id' => $follower->id,
        ]);
        //$this->assertEquals($userFollower->user_id, $follower->id);

        $userFollowerSearched = UserFollower::where(['follower_id' => $follower->id, 'user_id' => $user->id])->first();
        $userFollowerDeletedId = $userFollowerSearched->id;
        $userFollowerSearched->delete();

        $userFollowerSearched = UserFollower::find($userFollowerDeletedId);
        //dd($userFollowerSearched);
        $this->assertNull($userFollowerSearched);
    }


}
