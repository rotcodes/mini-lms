<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => '3X SAMEER',
            'email' => '3xsameer@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('3xsameer123'), // Replace 'password' with your desired password
            'role_id' => 1, // Admin role
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
