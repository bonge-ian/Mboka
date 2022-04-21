<?php

namespace App\Models;

use App\Domain\States\ListingTypeEnum;
use App\Models\Concerns\HasSlugWithKey;
use Illuminate\Database\Eloquent\Model;
use App\Domain\States\ListingStatusEnum;
use App\Domain\States\EmployeeAvailabilityEnum;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Listing extends Model
{
    use HasFactory;

    use HasSlugWithKey;

    protected $fillabe = [
        'employee_availability',
        'highlight_color',
        'is_highlighted',
        'listing_type',
        'on_site_days',
        'category_id',
        'company_id',
        'experience',
        'is_pinned',
        'show_logo',
        'user_id',
        'apply_url',
        'location',
        'overview',
        'status',
        'perks',
        'title',
        'slug',
    ];

    protected $casts = [
        'employee_availability' => EmployeeAvailabilityEnum::class,
        'listing_type' => ListingTypeEnum::class,
        'status' => ListingStatusEnum::class,
        'is_highlighted' => 'boolean',
        'is_pinned' => 'boolean',
        'show_logo' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(
            related: Category::class,
            foreignKey: 'category_id'

        );
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(
            related: Company::class,
            foreignKey: 'company_id'

        );
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'user_id'

        );
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(
            related: Tag::class,
            table: 'listing_tag',
            foreignPivotKey: 'listing_id',
            relatedPivotKey: 'tag_id'
        );
    }
}
