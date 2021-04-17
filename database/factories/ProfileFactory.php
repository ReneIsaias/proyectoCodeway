<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            /* 'avatar'        => $this->faker->imageUrl(1024, 1024, 'profiles', true, 'Faker'), */
            'avatar'        => 'user.png',
            'description'   => $this->faker->sentence(6),
            'birthday'      => $this->faker->date,
            'facebook'      => $this->faker->unique()->userName(),
            'instagram'     => $this->faker->unique()->userName(),
            'github'        => $this->faker->unique()->userName(),
            'website'       => $this->faker->url,
            'other'         => $this->faker->word,
            'user_id'       => rand(2, 50),
        ];
    }
}
