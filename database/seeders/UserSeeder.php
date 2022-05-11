<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
               'user_id'=> 1,
               'email' => 'bridge@mail.unpad.ac.id',
               'username' => 'Bridge',
               'password'=> bcrypt('admin123'),
               'role'=>'ADMIN',
               'name' => 'admin',
               'npm' => '140810190000',
               'avatar' => 'assets/profile/default.png',
               'year' => '2019',
               'faculty' => 'mipa',
               'phone_number' => '081234567890',
            ],
            [
               'user_id'=> 2,
               'email'=>'user@mail.unpad.ac.id',
               'username' => 'user',
               'password'=> bcrypt('user1234'),
               'role'=>'USER',
               'name' => 'user',
               'npm' => '140810190001',
               'avatar' => 'assets/profile/default.png',
               'year' => '2019',
               'faculty' => 'mipa',
               'phone_number' => '081234567890',
            ],
        ]);
    }
}
