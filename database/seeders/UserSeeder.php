<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
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
               'email' => 'bridge@mail.unpad.ac.id',
               'username' => 'bridge',
               'password'=> bcrypt('admin123'),
               'role'=>'admin',
               'name' => 'Admin Bridge',
               'npm' => '140810190000',
               'avatar' => 'assets/profile/default.png',
               'year' => '2019',
               'faculty' => 'mipa',
               'phone_number' => '081234567890',
            ],
            [
               'email'=>'user@mail.unpad.ac.id',
               'username' => 'user',
               'password'=> bcrypt('user1234'),
               'role'=>'user',
               'name' => 'User1',
               'npm' => '140810190001',
               'avatar' => 'assets/profile/default.png',
               'year' => '2019',
               'faculty' => 'mipa',
               'phone_number' => '081234567890',
            ],
        ]);
    }
}
