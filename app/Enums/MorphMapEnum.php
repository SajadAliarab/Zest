<?php

namespace App\Enums;

use App\Models\User;
use App\Models\Category;

enum MorphMapEnum: string
{
    case USER = 'user';
    case CATEGORY = 'category';

    public function modelClass(): string
    {
        return match ($this) {
            self::USER => User::class ,
            self::CATEGORY => Category::class,
        };
    }

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn (self $enum) => [
                $enum->value => $enum->modelClass(),
            ])
            ->toArray();
    }
}
