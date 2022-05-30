<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Adress>
 */
class AdressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $customerIds = \DB::table('customers')->pluck('id');

        return [
            'adress_by_customer' => $this->faker->optional($weight = 50)->address(),
            'city' => $this->faker->city(),
            'street' => $this->faker->streetName(),
            'house' => $this->faker->numerify('as-####'),
            'floor' => $this->faker->numberBetween(1, 50),
            'flat' => $this->faker->numberBetween(1, 1000),
            'customer_id' => $this->faker->randomElement($customerIds),
        ];
    }
}
