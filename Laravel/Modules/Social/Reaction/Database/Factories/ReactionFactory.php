<?php

namespace Modules\Social\Reaction\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Message;
use Modules\Social\Reaction\Models\Reaction;
use App\Models\Subject;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\reactions>
 */
class ReactionFactory extends Factory
{


    protected $model = Reaction::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'message_id' => Message::pluck('id')->random(),
            'reaction_types_id' =>  1,
            'user_id' =>  User::pluck('id')->random(),
        ];
    }
}
