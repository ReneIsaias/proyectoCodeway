<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nameUser'          => $this->faker->firstName('male' | 'female'),
            'firstLastname'     => $this->faker->lastName,
            'secondLastname'    => $this->faker->lastName,
            'phone'             => $this->faker->tollFreePhoneNumber,
            'name'              => $this->faker->userName,
            'email'             => $this->faker->unique()->email,
            'corporative'             => $this->faker->unique()->email,
            'email_verified_at' => now(),
            'password'          => Hash::make('password'),
            'remember_token'    => Str::random(10),
        ];
    }
}
