<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'body'              => $this->faker->realText(200, 2),
            'commentable_type'  => $this->faker->text(10),
            'commentable_id'    => $this->faker->biasedNumberBetween(1, 10),
            'user_id'           => rand(1, 50),
        ];
    }
}
