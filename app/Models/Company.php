<?php

namespace App\Models;

use App\Models\Concerns\HasSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;

    use HasSlug;

    protected $fillable = [
        'headquarters',
        'website',
        'slug',
        'logo',
        'name',
        'bio',
    ];

    public function listings(): HasMany
    {
        return $this->hasMany(
            related: Listing::class,
            foreignKey: 'company_id',
            localKey: 'id'
        );
    }
}
