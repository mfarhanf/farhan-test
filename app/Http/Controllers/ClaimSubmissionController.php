<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClaimSubmissionRequest;
use App\Models\ClaimSubmission;
use App\Services\BenefitServiceInterface;
use App\Services\ClaimSubmissionServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Inertia\Inertia;

class ClaimSubmissionController extends Controller
{
    private ClaimSubmissionServiceInterface $claimSubmissionService;
    private BenefitServiceInterface $benefitService;

    public function __construct(
        ClaimSubmissionServiceInterface $claimSubmissionService,
        BenefitServiceInterface $benefitService
    ) {
        $this->claimSubmissionService = $claimSubmissionService;
        $this->benefitService = $benefitService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $submissions = $this->claimSubmissionService->getAllClaimSubmissionData();

        return Inertia::render('ClaimSubmission/Index', [
            'submissions' => $submissions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $benefits = $this->benefitService->getAllBenefitData();

        return Inertia::render('ClaimSubmission/Create', [
            'benefits' => Arr::pluck($benefits, 'name', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClaimSubmissionRequest $request)
    {
        $validated = $request->validated();

        $data = [
            'username' => $validated['name'],
            'date' => $validated['date'],
            'benefit_id' => $validated['benefit'],
            'description' => $validated['description'],
            'amount' => $validated['amount'],
            'approval_status' => ClaimSubmission::STATUS_PENDING_ID,
        ];

        $this->claimSubmissionService->storeClaimSubmission($data);

        return redirect()->route('claim-submission.index')->with('message', 'Claim submission created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ClaimSubmission $claimSubmission)
    {
        $submission = $this->claimSubmissionService->transformClaimSubmissionByObject($claimSubmission);

        return Inertia::render('ClaimSubmission/Show', [
            'submission' => $submission,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClaimSubmission $claimSubmission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClaimSubmission $claimSubmission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClaimSubmission $claimSubmission)
    {
        //
    }
}
