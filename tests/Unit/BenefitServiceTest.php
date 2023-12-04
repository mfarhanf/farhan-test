<?php

namespace Tests\Unit;

use App\Repositories\BenefitRepositoryInterface;
use App\Services\BenefitService;
use PHPUnit\Framework\TestCase;

class BenefitServiceTest extends TestCase
{
    public function test_get_all_benefit_data(): void
    {
        $data = [
            [
                'id' => 1,
                'name' => 'foo',
                'description' => 'bar',
            ]
        ];

        $benefitRepository = $this->getMockBuilder(BenefitRepositoryInterface::class)->getMock();

        $benefitService = $this->getMockBuilder(BenefitService::class)->disableOriginalConstructor()->getMock();
        $benefitService
            ->expects($this->any())
            ->method('getAllBenefitData')
            ->willReturn($data);

        $this->assertEquals($data, $benefitService->getAllBenefitData());
    }
}
