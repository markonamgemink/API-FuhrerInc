<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'first_name' => 'Endrik',
            'last_name' => 'Septika',
            'password' => Hash::make(12345678),
            'role_id' => 1,
            'email' => 'admin@gmail.com',
        ]);
        User::create([
            'first_name' => 'Son',
            'last_name' => 'Gohan',
            'password' => Hash::make(12345678),
            'role_id' => 2,
            'email' => 'markonam87@gmail.com',
        ]);
    }
}
