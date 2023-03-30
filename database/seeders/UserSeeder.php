<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user   = new User();
        $user->uuid         = Str::uuid();
        $user->email        = 'proto@my-project.com';
        $user->name         = 'Proto';
        $user->password     = Hash::make('proto247');
        $user->created_at   = now();
        $user->save();

        User::factory()->count(100)->create();
    }
}
