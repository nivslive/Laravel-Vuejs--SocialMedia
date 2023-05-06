<?php

namespace Database\Factories;

use App\Models\Message;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reply>
 */
class ReplyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'message' => fake()->realText(200),
            'message_id' => Message::pluck('id')->random(),
            'user_id' => User::pluck('id')->random(),
        ];
    }
}
