<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Message;
use App\Models\Subject;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\reactions>
 */
class ReactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'type' => 'like',
            'message_id' => Message::pluck('id')->random(),
            'subject_id' =>  Subject::pluck('id')->random(),
            'user_id' =>  User::pluck('id')->random(),
        ];
    }
}
