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
                'nik'=> '19284930126542',
                'foto' =>'NULL',
                'nama' => 'admin 1',
                'level' => 'admin',
                'username' => 'admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('12345'),
                'no_hp'=> '0829182734',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1997-01-16',
                'alamat' => 'Malang',
                'remember_token' => Str::random(60),
            ]
        ];
        DB::table('users')->insert($user);
    }
}
