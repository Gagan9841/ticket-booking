<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TicketRate>
 */
class TicketRateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $type = fake()->name();
        $rate = fake()->randomDigit();
        return [
            'type'=>$type,
            'rate'=> $rate,
        ];
    }
}
