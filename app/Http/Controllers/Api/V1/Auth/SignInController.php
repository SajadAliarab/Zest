<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Actions\Api\V1\Auth\SignInAction;
use App\Http\Controllers\Api\V1\ApiBaseController;
use App\Http\Requests\Api\V1\Auth\SignInRequest;
use App\Http\Resources\UserResource;
use Symfony\Component\HttpFoundation\Response;

class SignInController extends ApiBaseController
{
    public function __invoke(SignInAction $action, SignInRequest $request)
    {
        $user = $action->handle($request->toDto());
        $token = $user->createToken($request->device)->plainTextToken;

        return response()->apiSuccess(
            data: [
                'user' => new UserResource($user),
                'remember' => $request->remember,
                'token' => $token],
            messages: 'User Sign In Successfully',
            responseCode: Response::HTTP_OK
        );
    }
}
