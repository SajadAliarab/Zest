<?php

namespace App\Actions\Api\V1\Auth;

use App\DataTransferObjects\Auth\SignUpDto;
use App\Models\User;
use App\Notifications\SignUpNotification;
use Illuminate\Support\Facades\DB;
use Throwable;

class SignUpAction
{
    public function handle(SignUpDto $dto): User
    {
        DB::beginTransaction();
        try{
            $user = User::query()->create([
                'name' => $dto->name,
                'email' => $dto->email,
                'password'=>$dto->password,
            ]);
            $user->notify( new SignUpNotification);
        }catch (Throwable $exception){
            DB::rollBack();
            throw $exception;
        }
        DB::commit();
        return $user;

    }
}
