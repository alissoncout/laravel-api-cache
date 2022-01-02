<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\Module;
use Illuminate\Database\Eloquent\Factories\Factory;
//use Illuminate\Support\Str;

class LessonFactory extends Factory
{
    protected $model = Lesson::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //'uuid' => Str::uuid(),
            'module_id' => Module::factory(),
            'name' => $this->faker->unique()->name(),
            'video' => $this->faker->unique()->url(),
            'description' => $this->faker->sentence(10)
        ];
    }
}
