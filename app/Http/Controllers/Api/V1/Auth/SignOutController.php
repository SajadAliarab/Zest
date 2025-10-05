<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class SignOutController extends Controller
{
    public function __invoke()
    {
        auth()->user()->currentAccessToken()->delete();
        return response()->apiSuccess(
            messages: 'Logged out successfully.',
            responseCode: Response::HTTP_OK
        );
    }
}
