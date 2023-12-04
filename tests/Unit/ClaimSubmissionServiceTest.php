<?php

namespace Tests\Unit;

use App\Repositories\ClaimSubmissionRepositoryInterface;
use App\Services\ClaimSubmissionService;
use PHPUnit\Framework\TestCase;

class ClaimSubmissionServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_get_all_claim_submission_data(): void
    {
        $data = [
            [
                'username' => 'John Doe',
                'date' => '2023-01-01',
                'benefit_id' => 1,
                'description' => 'foo',
                'amount' => 500000,
                'approval_status' => 1,
            ]
        ];

        $claimSubmissionRepository = $this->getMockBuilder(ClaimSubmissionRepositoryInterface::class)->getMock();

        $claimSubmissionService = $this->getMockBuilder(ClaimSubmissionService::class)->disableOriginalConstructor()
            ->getMock();
        $claimSubmissionService
            ->expects($this->any())
            ->method('getAllClaimSubmissionData')
            ->willReturn($data);

        $this->assertEquals($data, $claimSubmissionService->getAllClaimSubmissionData());
    }
}
