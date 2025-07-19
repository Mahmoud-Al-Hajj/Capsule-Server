<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Capsule>
 */
class CapsuleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
    return [
        "user_id" => $this->faker->randomNumber(2),
        "title" => $this->faker->randomElement([
        'A Letter to Myself',
        'The Day I’ll Remember',
        'Hope in Hard Times',
        'My Future Dreams',
        'Lessons Learned',
        'Dear Future Me',
        'Gratitude Note',
        'I Will Be Okay',
        'Steps to Growth',
        'This Moment Matters',
        'From the Heart',
        'Before I Forget'
    ]),
        "message" => $this->faker->realText(100),
        "mood" => $this->faker->randomElement(['happy', 'sad', 'excited', 'anxious', 'grateful', 'nostalgic']),
        "reveal_at" => $this->faker->date('Y-m-d'),
        "is_public" => $this->faker->boolean(50),
        "ip_address"=> $this->faker->ipv4(),
        "latitude" => $this->faker->latitude(),
        "longitude" => $this->faker->longitude()
        ];

    }
}
