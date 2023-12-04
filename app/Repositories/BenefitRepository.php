<?php

namespace App\Repositories;

use App\Repositories\BenefitRepositoryInterface;
use App\Models\Benefit;

class BenefitRepository implements BenefitRepositoryInterface 
{
    public function getAllData() 
    {
        return Benefit::all();
    }
}
