<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'id' => 1,
            'body' => Str::random(15),
            'user_id' => 1,
            'post_id' => 1,
            'created_at' => '2021-12-11 02:37:08',
            'updated_at' => '2021-12-11 02:37:08',
            'deleted_at' => NULL,
        ]);
        DB::table('comments')->insert([
            'id' => 2,
            'body' => '可愛い！！！！',
            'user_id' => 2,
            'post_id' => 2,
            'created_at' => '2021-12-15 11:53:33',
            'updated_at' => '2021-12-15 11:53:33',
            'deleted_at' => NULL,
        ]);
    }
}
