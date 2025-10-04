<?php

namespace App\Actions\Api\V1\Auth;

use App\DataTransferObjects\Auth\SignInDto;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Throwable;

class SignInAction
{
    public function handle(SignInDto $dto): User
    {
        $user = User::query()
            ->where('email', $dto->email)
            ->first();
        throw_if(! $user || ! Hash::check($dto->password, $user->password), ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]));
        Auth::login($user);
        return $user;
    }
}
