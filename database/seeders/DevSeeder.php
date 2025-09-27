<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DevSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User;
        $user->name = 'admin';
        $user->email = 'admin@dev.local';
        $user->email_verified_at = now();
        $user->password = 'abc@123';
        $user->is_admin = true;
        $user->save();
    }
}
