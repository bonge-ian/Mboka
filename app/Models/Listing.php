<?php

namespace App\Models;

use Illuminate\Support\Arr;
use Laravel\Scout\Searchable;
use App\Rules\Location\ValidCountry;
use Illuminate\Validation\Rules\Enum;
use App\Domain\States\ListingTypeEnum;
use App\Rules\Location\LocationFormat;
use App\Models\Concerns\HasSlugWithKey;
use Illuminate\Database\Eloquent\Model;
use App\Domain\States\ListingStatusEnum;
use Illuminate\Database\Eloquent\Builder;
use App\Domain\States\EmployeeAvailabilityEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @mixin IdeHelperListing
 */
class Listing extends Model implements Viewable
{
    use HasFactory;
    use Searchable;
    use HasSlugWithKey;
    use InteractsWithViews;

    protected $appends = ['expired_at'];

    protected $fillable = [
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

    public function clicks(): HasMany
    {
        return $this->hasMany(
            related: Click::class,
            foreignKey: 'listing_id'
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

    public function payments(): HasMany
    {
        return $this->hasMany(
            related: Payment::class,
            foreignKey: 'listing_id'
        );
    }

    public function scopeIsActive(Builder $query)
    {
        $query->where(
            column: 'status',
            operator: '=',
            value: ListingStatusEnum::ACTIVE
        );
    }

    public function scopeRelatedProducts(Builder $query)
    {
        $query
            ->where('category_id', $this->category_id)
            ->select(['id', 'title', 'slug', 'location', 'company_id'])
            ->with('company')
            ->inRandomOrder()
            ->limit(5);
    }


    public function toSearchableArray(): array
    {
        return [
            'employee_availability' => $this->employee_availability,
            'listing_type' => $this->listing_type,
            'category_id' => $this->category_id,
            'company_id' => $this->company_id,
            'user_id' => $this->user_id,
            'location' => $this->location,
            'status' => $this->status,
            'title' => $this->title,
            'slug' => $this->slug,
        ];
    }

    public static function rules(): array
    {
        return  [
            'employee_availability' => [
                'required',
                new Enum(EmployeeAvailabilityEnum::class)
            ],
            'is_highlighted' => 'nullable|sometimes|boolean',
            'highlight_color' => 'nullable|sometimes|required_with:is_highlighted|string',
            'listing_type' => [
                'required',
                new Enum(ListingTypeEnum::class)
            ],
            'on_site_days' => [
                'nullable',
                'numeric',
                'min:1',
                'max:5'
            ],
            'category_id' => 'required|numeric|exists:categories,id|min:1',
            'experience' => 'required|string|min:10',
            'is_pinned' => 'nullable|sometimes|boolean',
            'show_logo' => 'nullable|sometimes|boolean',
            'apply_url' => 'required|url',
            'location' => [
                'required',
                new LocationFormat,
                new ValidCountry,
            ],
            'overview' => 'required|string|min:10',
            'perks' => 'required|string|min:10',
            'title' => 'required|string|min:4',
        ];
    }

    protected function expiredAt(): Attribute
    {
        return Attribute::make(
            fn () => $this->created_at?->addMonth()
        );
    }
}
