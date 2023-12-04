<?php

namespace Database\Factories;

use App\Models\Benefit;
use App\Models\ClaimSubmission;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClaimSubmission>
 */
class ClaimSubmissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $benefit = Benefit::factory()->create();

        return [
            'username' => fake()->name(),
            'date' => fake()->date(),
            'benefit_id' => $benefit->id,
            'description' => fake()->text(),
            'amount' => 200000,
            'approval_status' => ClaimSubmission::STATUS_PENDING_ID,
        ];
    }
}
