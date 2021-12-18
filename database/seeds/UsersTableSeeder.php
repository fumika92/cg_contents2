<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'アガサ博士',
            'email' => 'aaa@aaa',
            'password' => Hash::make('aaaaaaaa'),
            'remember_token' => NULL,
            'body' => Str::random(20),
            'image_path' => 'https://fumika01.s3.amazonaws.com/user/34oGyVjqQxnZV87Kczhorq5pxctA2hwA1CAMOS7u.jpg',
            'created_at' => '2021-12-11 00:46:55',
            'updated_at' => '2021-12-18 21:18:39',
        ]);
        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Fumika',
            'email' => 'fumiake1107@gmail.com',
            'password' => Hash::make('12345678'),
            'remember_token' => NULL,
            'body' => Str::random(20),
            'image_path' => 'https://fumika01.s3.amazonaws.com/user/34oGyVjqQxnZV87Kczhorq5pxctA2hwA1CAMOS7u.jpg',
            'created_at' => '2021-12-15 11:49:52',
            'updated_at' => '2021-12-15 11:52:58',
        ]);
        DB::table('users')->insert([
            'id' => 3,
            'name' => 'Test',
            'email' => 'test@test',
            'password' => Hash::make('test1234'),
            'remember_token' => NULL,
            'body' => Str::random(20),
            'image_path' => 'https://fumika01.s3.amazonaws.com/user/34oGyVjqQxnZV87Kczhorq5pxctA2hwA1CAMOS7u.jpg',
            'created_at' => '2021-12-15 11:50:52',
            'updated_at' => '2021-12-15 11:55:58',
        ]);
    }
}
