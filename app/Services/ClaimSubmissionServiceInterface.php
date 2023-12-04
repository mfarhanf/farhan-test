<?php

namespace App\Services;

interface ClaimSubmissionServiceInterface 
{
    public function getAllClaimSubmissionData();
    public function transformClaimSubmissionByObject($submission);
    public function storeClaimSubmission($submission);
}
