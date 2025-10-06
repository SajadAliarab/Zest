<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Api\V1\ApiBaseController;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyEmailController extends ApiBaseController
{
    public function __invoke(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return response()->apiSuccess(
                messages: 'Email already verified',
                responseCode: Response::HTTP_OK
            );
        }
        $request->user()->sendEmailVerificationNotification();

        return response()->apiSuccess(
            messages: 'Verification link sent!',
            responseCode: Response::HTTP_OK
        );
    }
}
