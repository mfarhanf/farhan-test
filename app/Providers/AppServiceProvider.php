<?php

namespace App\Providers;

use App\Repositories\ClaimSubmissionRepository;
use App\Repositories\ClaimSubmissionRepositoryInterface;
use App\Services\ClaimSubmissionService;
use App\Services\ClaimSubmissionServiceInterface;
use App\Repositories\BenefitRepository;
use App\Repositories\BenefitRepositoryInterface;
use App\Services\BenefitService;
use App\Services\BenefitServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ClaimSubmissionRepositoryInterface::class, ClaimSubmissionRepository::class);
        $this->app->bind(ClaimSubmissionServiceInterface::class, ClaimSubmissionService::class);
        $this->app->bind(BenefitRepositoryInterface::class, BenefitRepository::class);
        $this->app->bind(BenefitServiceInterface::class, BenefitService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
