<?php

namespace App\Repositories;

interface ClaimSubmissionRepositoryInterface 
{
    public function getAllData();
    public function storeData($data);
}
