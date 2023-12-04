<?php

namespace Tests\Feature;

use App\Models\Benefit;
use App\Models\ClaimSubmission;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClaimSubmissionTest extends TestCase
{
    use RefreshDatabase;

    public function test_access_claim_submission_index(): void
    {
        $response = $this->get(route('claim-submission.index'));

        $response->assertStatus(200);
    }

    public function test_store_data_successfully(): void
    {
        $benefit = Benefit::factory()->create();

        $response = $this->post(route('claim-submission.store'), [
            'name' => fake()->name(),
            'date' => fake()->date(),
            'benefit' => $benefit->id,
            'description' => fake()->text(),
            'amount' => 200000,
            'approval_status' => ClaimSubmission::STATUS_PENDING_ID,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHas(['message' => 'Claim submission created successfully.']);
        $response->assertRedirect(route('claim-submission.index'));
    }

    public function test_store_data_failed(): void
    {
        $benefit = Benefit::factory()->create();

        $response = $this->from(route('claim-submission.create'))
            ->post(route('claim-submission.store'), [
                'name' => fake()->name(),
                'date' => fake()->date(),
                'benefit' => $benefit->id,
                'description' => fake()->text(),
                'approval_status' => ClaimSubmission::STATUS_PENDING_ID,
            ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['amount' => 'The amount field is required.']);
        $response->assertRedirect(route('claim-submission.create'));
    }

    public function test_view_data_found(): void
    {
        $claimSubmission = ClaimSubmission::factory()->create();

        $response = $this->get(route('claim-submission.show', $claimSubmission->id));

        $response->assertStatus(200);
    }

    public function test_view_data_not_found(): void
    {
        $response = $this->get(route('claim-submission.show', 0));

        $response->assertStatus(404);
    }
}
