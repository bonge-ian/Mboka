<?php

namespace App\Models;

use App\Models\Concerns\HasSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @mixin IdeHelperCompany
 */
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

    public static function rules(): array
    {
        return [
            'headquarters' => 'required|string',
            'website' => 'required|string|url',
            'logo' => 'required|image|max:1024',
            'name' => 'required|string|min:3',
            'bio' => 'required|string|min:10',
        ];
    }
}
