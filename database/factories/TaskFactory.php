<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentence(10);
        return [
            'name'          => $name,
            'slug'          => Str::slug($name),
            'description'   => $this->faker->text,
            'file'          => $this->faker->url,
            'start'         => $this->faker->dateTime(),
            'end'           => $this->faker->date,
            'informer'      => 'Manager',
            'responsable'   => $this->faker->name(),
            'statu_id'      => rand(1, 5),
            'priority_id'   => rand(1, 5),
            'type_id'       => rand(1, 6),
        ];
    }
}
