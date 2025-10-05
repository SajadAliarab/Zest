<?php

namespace App\DataTransferObjects\Auth;

readonly class SignInDto
{
    public function __construct(
        public string $email,
        public string $password,
        public bool $rememberMe,
    ) {}
}
