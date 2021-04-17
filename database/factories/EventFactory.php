<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(5);
        return [
            'title'         => $title,
            'slug'          => Str::slug($title,'-'),
            'description'   => $this->faker->text(50),
            'start'         => now(),
            'end'           => $this->faker->date(),
            'color'         => $this->faker->colorName,
            'textColor'     => $this->faker->safeColorName,
        ];
    }
}
