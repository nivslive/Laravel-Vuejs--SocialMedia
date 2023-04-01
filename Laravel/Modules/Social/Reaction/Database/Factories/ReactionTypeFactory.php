<?php

namespace Modules\Social\Reaction\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Social\Reaction\Models\ReactionType;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReactionType>
 */
class ReactionTypeFactory extends Factory
{


    protected $model = ReactionType::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => 'love',
            'slug' => 'love',
            'img' => '',
        ];
    }
}
