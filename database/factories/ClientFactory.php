<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'tin_jmbg' => fake()->unique()->numerify('#############'),
            'activity_code' => fake()->unique()->numerify('######'),
            'company_name' => fake()->company(),
            'bank_account' => fake()->unique()->creditCardNumber(),
            'phone_number' => fake()->phoneNumber(),
            'name' => fake()->name(),
            'surname' => fake()->lastName(),
            'address' => fake()->address(),
            'city' => fake()->city(),
            'email' => fake()->unique()->safeEmail()
        ];
    }
}
