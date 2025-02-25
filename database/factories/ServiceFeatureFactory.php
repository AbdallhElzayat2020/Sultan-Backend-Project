<?php

namespace Database\Factories;

use App\Models\Service;
use App\Models\ServiceFeature;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ServiceFeatureFactory extends Factory
{
    protected $model = ServiceFeature::class;

    public function definition(): array
    {
        return [
            'title' => fake()->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'service_id' => Service::factory(),
        ];
    }
}
