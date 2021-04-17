<?php

namespace Database\Factories;

use App\Models\Preuser;
use Illuminate\Database\Eloquent\Factories\Factory;

class PreuserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Preuser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'      => $this->faker->userName,
            'lastname'  => $this->faker->lastName,
            'phone'     => $this->faker->tollFreePhoneNumber,
            'email'     => $this->faker->unique()->email,
        ];
    }
}
