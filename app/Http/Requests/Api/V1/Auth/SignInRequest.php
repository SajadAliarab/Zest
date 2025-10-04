<?php

namespace App\Http\Requests\Api\V1\Auth;

use App\Contracts\Requests\HasDataTransferObjectInterface;
use App\DataTransferObjects\Auth\SignInDto;
use Illuminate\Foundation\Http\FormRequest;

class SignInRequest extends FormRequest implements HasDataTransferObjectInterface
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required'],
            'remember_me' => ['boolean'],
            'device' => ['required', 'string'],
        ];
    }

    public function toDto(): SignInDto
    {
        return new SignInDto(
            email: $this->input('email'),
            password: $this->input('password'),
            rememberMe: $this->input('remember'),
            device: $this->input('device')
        );
    }
}
