<?php

declare(strict_types=1);

namespace App\Models\Concerns;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

trait HasSlugWithKey
{
    public static function bootHasSlugWithKey()
    {
        static::creating(function (Model $model) {
            $attributeToGenerateSlug = ($model->name) ? $model->name : $model->title;

            $attributeWithKey = $attributeToGenerateSlug . '-' . random_int(1111, 9999);

            $model->slug = Str::slug(title: $attributeWithKey);
        });
    }
}
