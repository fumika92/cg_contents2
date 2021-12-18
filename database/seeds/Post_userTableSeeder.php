<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Post_userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_user')->insert([
            'id' => 3,
            'user_id' => 2,
            'post_id' => 2,
            'created_at' => NULL,
            'updated_at' => NULL,
        ]);
        DB::table('post_user')->insert([
            'id' => 6,
            'user_id' => 1,
            'post_id' => 4,
            'created_at' => NULL,
            'updated_at' => NULL,
        ]);
    }
}
