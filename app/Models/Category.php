<?php

namespace App\Models;

use App\Models\Concerns\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperCategory
 */
class Category extends Model
{
    use HasFactory;

    use HasSlug;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function listings(): HasMany
    {
        return $this->hasMany(
            related: Listing::class,
            foreignKey: 'category_id',
            localKey: 'id'
        );
    }
}
