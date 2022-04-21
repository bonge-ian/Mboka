<?php

declare(strict_types=1);

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasSlug
{
    public static function bootHasSlug()
    {
        static::creating(function (Model $model) {
            $attributeToGenerateSlug = ($model->name) ? $model->name : $model->title;

            $model->slug = Str::slug(title: $attributeToGenerateSlug);
        });
    }
}
