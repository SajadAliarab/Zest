<?php

namespace App\DataTransferObjects\Auth;

class SignUpDto
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
    )
    {}
}
