<?php

namespace App\Models;

use App\Models\Concerns\HasSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    use HasSlug;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function listings(): BelongsToMany
    {
        return $this->belongsToMany(
            related: Listing::class,
            table: 'listing_tag',
            foreignPivotKey: 'tag_id',
            relatedPivotKey: 'listing_id'
        );
    }
}
