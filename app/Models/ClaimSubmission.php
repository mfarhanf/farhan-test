<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClaimSubmission extends Model
{
    use HasFactory;

    const STATUS_PENDING_ID = 1;
    const STATUS_APPROVED_ID = 2;
    const STATUS_REJECTED_ID = 3;
    const STATUS_PENDING = 'Waiting for approval';
    const STATUS_APPROVED = 'Approved';
    const STATUS_REJECTED = 'Rejected';
    const APPROVAL_STATUS = [
        self::STATUS_PENDING_ID => self::STATUS_PENDING,
        self::STATUS_APPROVED_ID => self::STATUS_APPROVED,
        self::STATUS_REJECTED_ID => self::STATUS_REJECTED,
    ];

    protected $fillable = [
        'username',
        'date',
        'benefit_id',
        'description',
        'amount',
        'approval_status',
    ];

    public function benefit(): BelongsTo
    {
        return $this->belongsTo(Benefit::class);
    }
}
