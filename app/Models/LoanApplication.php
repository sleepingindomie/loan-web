<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LoanApplication extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'amount',
        'tenure',
        'purpose',
        'status',
        'user_id',
    ];

    /**
     * Get the user that owns the loan application.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
