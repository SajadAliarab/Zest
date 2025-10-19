<?php

namespace App\Http\Controllers\Api\V1\Category;

use App\Actions\Api\V1\Category\GetCategoriesAction;
use App\Http\Controllers\Api\V1\ApiBaseController;
use App\Http\Resources\CategoryResource;

class GetCategoriesController extends ApiBaseController
{
    public function __invoke(GetCategoriesAction $action)
    {
        $categories = $action->handle();

        return response()->apiSuccess(
            data: CategoryResource::collection($categories),
        );

    }
}
