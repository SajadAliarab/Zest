<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VerifyEmailUserController extends Controller
{
    public function __invoke(int $id, string $hash, Request $request)
    {
        $user = User::query()->findOrFail($id);

        if (! hash_equals(sha1($user->getEmailForVerification()), $hash)) {
            return new JsonResponse(['message' => 'Invalid verification link'], 403);
        }

        if ($user->hasVerifiedEmail()) {
            return new JsonResponse(['message' => 'User verified already'], 200);
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        return new JsonResponse(['message' => 'User verified'], 201);
    }
}
