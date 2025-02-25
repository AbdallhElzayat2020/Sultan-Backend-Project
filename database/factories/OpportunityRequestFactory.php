<?php

namespace Database\Factories;

use App\Enums\OpportunityType;
use App\Models\Opportunity;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class OpportunityRequestFactory extends Factory
{
    protected $model = Opportunity::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'years_of_exp' => $this->faker->randomNumber(),
            'field_of_exp' => $this->faker->randomNumber(),
            'education' => $this->faker->word(),
            'job_title' => $this->faker->word(),
            'type' => $this->faker->randomElement(OpportunityType::values()),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
