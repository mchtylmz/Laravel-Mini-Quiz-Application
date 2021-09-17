<?php

namespace Database\Factories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Question::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'quiz_id' => rand(1,5),
            'title'   => $this->faker->sentence(rand(4,10)),
            'answer1' => $this->faker->text(10),
            'answer2' => $this->faker->text(10),
            'answer3' => $this->faker->text(10),
            'answer4' => $this->faker->text(10),
            'correct' => 'answer' . rand(1,4),
        ];
    }
}
