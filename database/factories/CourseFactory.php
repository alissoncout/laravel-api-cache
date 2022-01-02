<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
//use Illuminate\Support\Str;

class CourseFactory extends Factory
{
    protected $model = Course::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //'uuid' => Str::uuid(),
            'name' => $this->faker->unique()->name(),
            'description' => $this->faker->sentence(10),
        ];
    }
}
