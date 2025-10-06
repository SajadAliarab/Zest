<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Actions\Api\V1\Auth\SignUpAction;
use App\Http\Controllers\Api\V1\ApiBaseController;
use App\Http\Requests\Api\V1\Auth\SignUpRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Response;

class SignUpController extends ApiBaseController
{
    public function __invoke(SignUpAction $action, SignUpRequest $request)
    {
        $user = $action->handle($request->toDto());

        return response()->apiSuccess(
            data: new UserResource($user),
            messages: 'User Sign Up successfully',
            responseCode: Response::HTTP_OK
        );
    }
}
