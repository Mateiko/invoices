<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\UnitOfMeasure;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InvoiceItem>
 */
class InvoiceItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->word(),
            'quantity' => fake()->numberBetween(1, 10),
            'price' => fake()->randomFloat($maxDecimal = 2, $min = 3, $max = 100),
            'discount' => fake()->randomFloat($maxDecimal = 0, $min = 5, $max = 20),
            'total_price' => fake()->randomFloat($maxDecimal = 2, $min = 70, $max = 200),
            'description' => fake()->text(20),
            'unit_of_measure_id' => UnitOfMeasure::all()->random()->id,
            'invoice_id' => Invoice::all()->random()->id,
        ];
    }
}
