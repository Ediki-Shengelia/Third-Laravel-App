<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Market>
 */
class MarketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $price = fake()->numberBetween(250, 4000);
        return [
            'title' => fake()->words(3, true),
            'price' => $price,
            'old_price' => $price + fake()->numberBetween(100, 1000),
            'type' => fake()->randomElement(\App\Models\Market::$type),
            'user_id' => null,
            'product_image' => null,
            'phone_number' => fake()->phoneNumber(),
            'description' => fake()->paragraphs,
            'location' => fake()->city(),
            'created_at' => fake()->dateTimeBetween('-4 years'),
            'updated_at' => function (array $att) {
                return fake()->dateTimeBetween($att['created_at'], 'now');
            }
        ];
    }
}
