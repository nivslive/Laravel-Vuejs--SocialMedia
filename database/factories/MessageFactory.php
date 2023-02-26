<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Subject;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {  $id = 2;
        return [
            'likes' => fake()->numberBetween(0, 100),
            'message' => fake()->text(),
            'subject_id' => Subject::pluck('id')->random(),
            'user_id' => User::pluck('id')->random(),
        ];
    }
}
