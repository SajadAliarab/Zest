<?php

namespace App\Models;

use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string | null $description
 * @property int | null $parent_id
 * @property CarbonImmutable | null $created_at
 * @property CarbonImmutable | null $updated_at
 * @property CarbonImmutable | null $deleted_at
 */

class Category extends Model
{
    use SoftDeletes;
    use HasFactory;

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class,'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Category::class,'parent_id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function attachment(): MorphOne
    {
        return $this->morphOne(Attachment::class,'attachmentable');
    }
}
