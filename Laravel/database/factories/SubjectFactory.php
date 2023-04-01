<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Chat;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = fake()->realText(100);
        $id = 2;
        return [
            'title' => $title,
            'slug' =>  Str::of($title)->slug('-'),
            'description' => fake()->realText(200),
            'chat_id' =>  Chat::pluck('id')->random(),
            'user_id' => User::pluck('id')->random(),
        ];
    }
}
