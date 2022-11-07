<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $user =[
            [
                'name' => 'admin 1',
                'level' => 'admin',
                'profile' => 'profile.png',
                'username' => 'admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('12345'),
                'remember_token' => Str::random(60),
            ],
            [
                'name' => 'user 1',
                'level' => 'user',
                'profile' => 'profile.png',
                'username' => 'salwa',
                'email' => 'salwa@user.com',
                'password' => bcrypt('12345'),
                'remember_token' => Str::random(60),
            ],
            [
                'name' => 'user 2',
                'level' => 'user',
                'profile' => 'profile.png',
                'username' => 'nazela',
                'email' => 'nazela@user.com',
                'password' => bcrypt('12345'),
                'remember_token' => Str::random(60),
            ]
        ];
        DB::table('users')->insert($user);
    }
}
