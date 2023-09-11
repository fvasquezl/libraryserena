<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class RoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Role::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'      => $role = $this->faker->word,
            'slug'      => Str::slug($role),
            'description'   => $this->faker->sentence,
            'special'   => Str::random('10')
        ];
    }
}
