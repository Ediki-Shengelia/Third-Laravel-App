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
        // return [
        //     'title' => fake()->words(3, true),
        //     'price' => $price,
        //     'old_price' => $price + fake()->numberBetween(100, 1000),
        //     'type' => fake()->randomElement(\App\Models\Market::$type),
        //     'user_id' =>\App\Models\User::factory(),
        //     'product_image' => 'https://placehold.co/640x480?text=Product',
        //     'unique_id' => fake()->unique()->uuid(), // or fake()->randomNumber() depending on your type
        //     'phone_number' => fake()->phoneNumber(),
        //     'description' => fake()->text(),
        //     'location' => fake()->city(),
        //     'created_at' => fake()->dateTimeBetween('-4 years'),
        //     'updated_at' => function (array $att) {
        //         return fake()->dateTimeBetween($att['created_at'], 'now');
        //     }
        // ];
        return [
            'unique_id'     => fake()->unique()->numberBetween(1000, 99999), // Fixed: Sending an Integer
            'title'         => str(fake()->words(3, true))->headline(),
            'price'         => $price,
            'old_price'     => $price + fake()->numberBetween(100, 1000),
            'type'          => fake()->randomElement(\App\Models\Market::$type),
            'user_id'       => \App\Models\User::factory(), // Fixed: Fallback for integrity check
            'product_image' => 'https://placehold.co/640x480?text=Product',
            'phone_number'  => fake()->phoneNumber(),
            'description'   => fake()->text(200), // Fixed: Ensuring it's a string, not an array
            'location'      => fake()->city(),
            'created_at'    => fake()->dateTimeBetween('-4 years'),
            'updated_at'    => function (array $att) {
                return fake()->dateTimeBetween($att['created_at'], 'now');
            }
        ];
    }
}
