<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Api\V1\ApiBaseController;
use App\Http\Resources\UserResource;
use Symfony\Component\HttpFoundation\Response;

class CurrentUserController extends ApiBaseController
{
    public function __invoke()
    {
        $user = auth()->user();

        return response()->apiSuccess(
            data: [
                'user' => new UserResource($user),
                'role' => $user->isAdmin() ? 'admin' : 'user',
                'token' => $user->currentAccessToken()->expires_at,
            ],
            messages: 'User data retrieved successfully.',
            responseCode: Response::HTTP_OK
        );
    }
}
