<?php

namespace Database\Factories;

use App\Models\Holiday;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class HolidayFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Holiday::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(5);
        return [
            'days'          => rand(1, 6),
            'beginDate'     => '2020-01-01',
            'endDate'       => '2021-01-01',
            'inProcess'     => rand(1, 5),
            'taken'         => rand(1, 4),
            'available'     => rand(1, 3),
            'responsable'   => 'Administrador',
            'commentable'   => $this->faker->sentence,
            'absence_id'    => rand(1, 7),
            'period_id'     => rand(1, 7),
        ];
    }
}
