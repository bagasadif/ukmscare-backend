<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
               'user_id'=> 1,
               'email' => 'bridge@mail.unpad.ac.id',
               'username' => 'Bridge',
               'password'=> bcrypt('admin'),
               'role'=>'ADMIN',
            ],
            [
               'user_id'=> 2,
               'email'=>'user190011@mail.unpad.ac.id',
               'username' => 'user01',
               'password'=> bcrypt('123456'),
               'role'=>'USER',
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
