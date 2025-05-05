<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Module;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ModuleAccess>
 */
class ModuleAccessFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id,
            'module_id' => Module::all()->random()->id,
            'have_access' => fake()->randomElement([0, 1]),
        ];
    }
}
