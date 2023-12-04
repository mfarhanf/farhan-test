<?php

namespace App\Services;

use App\Models\ClaimSubmission;
use App\Repositories\ClaimSubmissionRepositoryInterface;
use App\Services\ClaimSubmissionServiceInterface;

class ClaimSubmissionService implements ClaimSubmissionServiceInterface 
{
    private ClaimSubmissionRepositoryInterface $claimSubmissionRepository;

    public function __construct(ClaimSubmissionRepositoryInterface $claimSubmissionRepository) 
    {
        $this->claimSubmissionRepository = $claimSubmissionRepository;
    }

    public function getAllClaimSubmissionData()
    {
        $submissions = $this->claimSubmissionRepository->getAllData();

        return $this->transformArrayData($submissions);
    }

    public function transformClaimSubmissionByObject($submission)
    {
        return $this->transformSingleData($submission);
    }

    public function storeClaimSubmission($submission)
    {
        return $this->claimSubmissionRepository->storeData($submission);
    }

    // PRIVATE METHODS

    private function transformArrayData($data)
    {
        foreach ($data as $value) {
            $this->transformSingleData($value);
        }

        return $data;
    }

    private function transformSingleData($data)
    {
        $data->benefit_name = $data->benefit->name;
        $data->amount = number_format($data->amount, 0, ',', '.');
        $data->approval_status = ClaimSubmission::APPROVAL_STATUS[$data->approval_status];

        return $data;
    }
}
