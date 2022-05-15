<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @mixin IdeHelperClick
 */
class Click extends Model
{
    use HasFactory;

    protected $fillable = [
        'os',
        'city',
        'device',
        'browser',
        'country',
        'user_agent',
        'ip_address',
        'listing_id',
        'device_type',
    ];

    public function listing(): BelongsTo
    {
        return $this->belongsTo(Listing::class);
    }
}
