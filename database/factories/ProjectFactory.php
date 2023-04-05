<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'url' => $this->faker->url,
            'slug' => $this->faker->slug,
            'content' => $this->faker->paragraph,
            'user_id' => User::all()->random(),
            'type_id' => Type::all()->random(),
        ];
    }

}
