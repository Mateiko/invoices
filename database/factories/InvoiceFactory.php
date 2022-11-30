<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'client_id' => Client::all()->random()->id,
            'invoice_number' => fake()->unique()->randomNumber(),
            'payment_term' => fake()->date(),
            'status' => fake()->randomElement(['Paid','In progress','Not paid']),
            'description' => fake()->paragraph(),
        ];
    }
}
