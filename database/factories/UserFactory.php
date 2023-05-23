<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'full_name' => 'Adil',
            'email' => '27211@iitu.edu.kz',
            'phone' => '87084012272',
            'password' => Hash::make('123456789'),
            'image' => 'https://api.dicebear.com/6.x/thumbs/png?seed=Buster',
            'library_card' => asset('assets/img/library_1.png'),
            'remember_token' => Str::random(10),
        ];
    }
}
