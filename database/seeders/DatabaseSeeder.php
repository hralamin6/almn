<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Setup;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name'=>'hr alamin',
            'type'=>'admin',
            'phone'=>'01472583695',
            'email'=>'hralamin2020@gmail.com',
            'email_verified_at' => now(),
            'password'=>Hash::make('000000')
        ]);
        User::create([
            'name'=>'user',
            'type'=>'user',
            'phone'=>'01472583695',
            'email'=>'user@gmail.com',
            'email_verified_at' => now(),
            'password'=>Hash::make('000000')
        ]);
        User::factory()->count(10)->create();
        Setup::factory()->count(1)->create();
    }
}
