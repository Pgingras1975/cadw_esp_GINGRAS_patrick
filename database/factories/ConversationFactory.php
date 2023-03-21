<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ConversationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "reponses" => $reponses = $this->faker->text(25),
            "questions" => $questions = $this->faker->text(25),
            "user_id" => rand(1,5)
        ];
    }
}
