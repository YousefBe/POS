<?php

use App\Role;
use App\User;
use App\Client;
use App\Permission;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'FName' => 'Youssef',
            'LName' => 'Belal',
            'email' => 'joebelal7@gmail.com',
            'password' => 123,
        ]);

        $user->attachRole('Super_admin');
        $user->syncPermissions(Permission::all());

        $user2 = User::create([
            'FName' => 'marwan',
            'LName' => 'essam',
            'email' => 'mero@gmail.com',
            'password' => 123,
        ]);

        $user2->attachRole('admin');


        $user3 = User::create([
            'FName' => 'mostafa',
            'LName' => 'sa3ed',
            'email' => 'se3da@gmail.com',
            'password' => 123,
        ]);

        $user3->attachRole('admin');


        $user4 = User::create([
            'FName' => 'mostafa',
            'LName' => 'elNerm',
            'email' => 'Nerm@gmail.com',
            'password' => 123,
        ]);

        $user4->attachRole('Super_admin');
        $user4->syncPermissions(Permission::all());

        $user4 = User::create([
            'FName' => 'ahmed',
            'LName' => 'hassan',
            'email' => 'elsakr@gmail.com',
            'password' => 123,
        ]);

        $user4->attachRole('user');
        $user4 = User::create([
            'FName' => '5aled',
            'LName' => 'metwaly',
            'email' => 'metoo@gmail.com',
            'password' => 123,
        ]);

        $user4->attachRole('user');
        $user4 = User::create([
            'FName' => 'yara',
            'LName' => 'bola',
            'email' => 'yara@gmail.com',
            'password' => 123,
        ]);

        $user4->attachRole('user');
    }
}