<?php

namespace Database\Factories;

use App\Models\Offer;
use App\Models\OfferDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class OfferDetailFactory extends Factory
{
    protected $model = OfferDetail::class;

    public function definition(): array
    {
        return [
            'section' => $this->faker->word(),
            'data' => $this->faker->words(),

            'offer_id' => Offer::factory(),
        ];
    }
}
