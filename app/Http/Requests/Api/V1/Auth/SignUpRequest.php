<?php

namespace App\Http\Requests\Api\V1\Auth;

use App\Contracts\Requests\HasDataTransferObjectInterface;
use App\DataTransferObjects\Auth\SignUpDto;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class SignUpRequest extends FormRequest implements HasDataTransferObjectInterface
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'max:254', 'unique:users,email'],
            'password' => ['required',
                'string',
                'confirmed',
                Password::min(8)->letters()->mixedCase()->numbers()->symbols(),
            ],
        ];
    }

    public function toDto(): SignUpDto
    {
        return new SignUpDto(
            name: $this->input('name'),
            email: $this->input('email'),
            password: $this->input('password'),
        );
    }
}
