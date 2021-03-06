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
               'id' => 1,
               'email' => 'uku@mail.unpad.ac.id',
               'username' => 'uku',
               'password'=> bcrypt('admin123'),
               'role'=>'admin',
               'name' => 'Unit Karate Unpad',
               'avatar' => 'assets/profile/default.png',
               'npm' => null,
               'year' => null,
               'faculty' => null,
               'phone_number' => null,
               'is_email_verified' => '1'
            ],
            [
               'id' => 2,
               'email' => 'mpup@mail.unpad.ac.id',
               'username' => 'mpup',
               'password'=> bcrypt('admin123'),
               'role'=>'admin',
               'name' => 'Merpati Putih Unpad',
               'avatar' => 'assets/profile/default.png',
               'npm' => null,
               'year' => null,
               'faculty' => null,
               'phone_number' => null,
               'is_email_verified' => '1'
            ],
            [
               'id' => 3,
               'email' => 'ubtu@mail.unpad.ac.id',
               'username' => 'ubtu',
               'password'=> bcrypt('admin123'),
               'role'=>'admin',
               'name' => 'Unit Bulu Tangkis Unpad',
               'avatar' => 'assets/profile/default.png',
               'npm' => null,
               'year' => null,
               'faculty' => null,
               'phone_number' => null,
               'is_email_verified' => '1'
            ],
            [
               'id' => 4,
               'email' => 'uru@mail.unpad.ac.id',
               'username' => 'uru',
               'password'=> bcrypt('admin123'),
               'role'=>'admin',
               'name' => 'Unit Renang Unpad',
               'avatar' => 'assets/profile/default.png',
               'npm' => null,
               'year' => null,
               'faculty' => null,
               'phone_number' => null,
               'is_email_verified' => '1'
            ],
            [
               'id' => 5,
               'email' => 'psm@mail.unpad.ac.id',
               'username' => 'psm',
               'password'=> bcrypt('admin123'),
               'role'=>'admin',
               'name' => 'Paduan Suara Mahasiswa Universitas Padjadjaran',
               'avatar' => 'assets/profile/default.png',
               'npm' => null,
               'year' => null,
               'faculty' => null,
               'phone_number' => null,
               'is_email_verified' => '1'
            ],
            [
               'id' => 6,
               'email' => 'spdc@mail.unpad.ac.id',
               'username' => 'spdc',
               'password'=> bcrypt('admin123'),
               'role'=>'admin',
               'name' => 'Sadaluhung Padjadjaran Drum Corps',
               'avatar' => 'assets/profile/default.png',
               'npm' => null,
               'year' => null,
               'faculty' => null,
               'phone_number' => null,
               'is_email_verified' => '1'
            ],
            [
               'id' => 7,
               'email'=>'user@mail.unpad.ac.id',
               'username' => null,
               'password'=> bcrypt('user1234'),
               'role'=>'user',
               'name' => 'User1',
               'avatar' => 'assets/profile/default.png',
               'npm' => '140810190001',
               'year' => '2019',
               'faculty' => 'mipa',
               'phone_number' => '081234567890',
               'is_email_verified' => '1'
            ],
            [
               'id' => 8,
               'email'=>'johndoe@mail.unpad.ac.id',
               'username' => null,
               'password'=> bcrypt('user1234'),
               'role'=>'user',
               'name' => 'John Doe',
               'npm' => '140810190002',
               'avatar' => 'assets/profile/default.png',
               'year' => '2019',
               'faculty' => 'mipa',
               'phone_number' => '081223334444',
               'is_email_verified' => false
            ],
        ]);
    }
}
