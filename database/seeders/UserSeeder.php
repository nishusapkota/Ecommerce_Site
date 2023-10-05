<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => Hash::make('user1234'),
            'usertype' => '0',
            'phone' => '9821939640',
            'address' => 'nawalpur',
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123'),
            'usertype' => '1',
            'phone' => '9821939640',
            'address' => 'kathmandu',
        ]);
    }
}
