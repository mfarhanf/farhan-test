<?php

namespace App\Services;

use App\Repositories\BenefitRepositoryInterface;
use App\Services\BenefitServiceInterface;

class BenefitService implements BenefitServiceInterface 
{
    private BenefitRepositoryInterface $benefitRepository;

    public function __construct(BenefitRepositoryInterface $benefitRepository) 
    {
        $this->benefitRepository = $benefitRepository;
    }

    public function getAllBenefitData()
    {
        return $this->benefitRepository->getAllData();
    }
}
