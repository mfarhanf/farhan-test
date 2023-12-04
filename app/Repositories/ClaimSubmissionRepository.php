<?php

namespace App\Repositories;

use App\Models\ClaimSubmission;
use App\Repositories\ClaimSubmissionRepositoryInterface;

class ClaimSubmissionRepository implements ClaimSubmissionRepositoryInterface 
{
    public function getAllData()
    {
        return ClaimSubmission::all();
    }

    public function storeData($data)
    {
        return ClaimSubmission::create($data);
    }
}
