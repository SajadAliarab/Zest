<?php

namespace App\Models;

use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string $slug
 * @property string | null $description
 * @property float $price
 * @property float | null $discount
 * @property boolean $status
 * @property CarbonImmutable | null $created_at
 * @property CarbonImmutable | null $updated_at
 * @property CarbonImmutable | null $deleted_at
 */
class Product extends Model
{
    use SoftDeletes;
    use HasFactory;

    public function casts():array
    {
        return [
            "price" => "decimal:2",
            "status" => "boolean",
        ];
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
