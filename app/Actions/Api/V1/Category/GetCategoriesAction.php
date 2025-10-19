<?php

namespace App\Actions\Api\V1\Category;

use App\Models\Category;
use Illuminate\Support\Collection;

class GetCategoriesAction
{
    public function handle(): Collection
    {
        return Category::query()
            ->with(['children', 'attachment'])
            ->get();
    }
}
