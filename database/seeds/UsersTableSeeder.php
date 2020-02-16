<?php

use Illuminate\Database\Seeder;

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
        App\User::create([
            'name' => 'hoge',
            'email' => 'hoge@hoge.hoge',
            'password' => Hash::make('hoge')
        ]);
    }
}
