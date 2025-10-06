<?php

namespace App\DataTransferObjects\Auth;

readonly class SignUpDto
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
    ) {}
}
