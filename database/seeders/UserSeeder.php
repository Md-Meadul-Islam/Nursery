<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(100)->create()->each(function ($user) {
            $user->update([
                'name' => \Faker\Factory::create()->name,
                'username' => \Faker\Factory::create()->userName,
                'email' => \Faker\Factory::create()->unique()->safeEmail,
                'phone' => \Faker\Factory::create()->unique()->randomNumber,
                'photo' => 'default.png',
                'states' => \Faker\Factory::create()->city,
                'country' => \Faker\Factory::create()->country,
                'currency' => \Faker\Factory::create()->currencyCode,
                'type' => \Faker\Factory::create()->randomElement(['admin', 'seller', 'buyer']),
                'status' => 'active',
                'password' => Hash::make('11111111'),
            ]);
        });
    }
}
