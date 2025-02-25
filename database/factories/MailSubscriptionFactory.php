<?php

namespace Database\Factories;

use App\Models\MailSubscription;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class MailSubscriptionFactory extends Factory
{
    protected $model = MailSubscription::class;

    public function definition(): array
    {
        return [
            'email' => $this->faker->unique()->safeEmail(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
