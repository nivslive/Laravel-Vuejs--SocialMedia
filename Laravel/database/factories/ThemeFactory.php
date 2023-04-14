<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Theme>
 */
class ThemeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    private static $order = 1;
    public function definition()
    {
        $title = fake()->domainWord();
        return  [

            'title' => $title,
            'slug' =>  Str::of($title)->slug('-'),
            'description' => fake()->text(),
            'subjects_all_messages_count' => self::$order++
        ];
    }
}
