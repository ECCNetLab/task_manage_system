<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 適当なユーザ
        User::create([
            'name' => 'hoge',
            'email' => 'hoge@hoge.hoge',
            'password' => Hash::make('hoge'),
        ]);
        User::create([
            'name' => 'huga',
            'email' => 'huga@huga.huga',
            'password' => Hash::make('huga'),
        ]);
    }
}
