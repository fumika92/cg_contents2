<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'id' => 1,
            'title' => 'ティーカップ',
            'body' => Str::random(50),
            'image_path' => 'https://fumika01.s3.amazonaws.com/contents/image/Lz4eCmNmxFqqVER7Qmc2koUroE2Bt40dUiu3QAUr.png',
            'user_id' => 1,
            'category_id' => 5,
            'created_at' => '2021-12-11 01:28:57',
            'updated_at' => '2021-12-15 11:43:53',
            'deleted_at' => NULL,
        ]);
        DB::table('posts')->insert([
            'id' => 2,
            'title' => '金髪の女の子',
            'body' => Str::random(60),
            'image_path' => 'https://fumika01.s3.amazonaws.com/contents/image/mWWNOpPb1DG80YK9Ks1knDdZsxvncXvqeYW6KLhl.png',
            'user_id' => 1,
            'category_id' => 4,
            'created_at' => '2021-12-15 11:46:39',
            'updated_at' => '2021-12-15 11:46:39',
            'deleted_at' => NULL,
        ]);
        DB::table('posts')->insert([
            'id' => 3,
            'title' => '口のモデリング',
            'body' => Str::random(55),
            'image_path' => 'https://fumika01.s3.amazonaws.com/contents/image/20ZY2mVM6b7o9aR2S1k3EaZgr3nRH40crLO7PfaA.jpg',
            'user_id' => 1,
            'category_id' => 4,
            'created_at' => '2021-12-15 11:48:00',
            'updated_at' => '2021-12-15 11:48:34',
            'deleted_at' => NULL,
        ]);
        DB::table('posts')->insert([
            'id' => 4,
            'title' => '子供のドラゴン',
            'body' => Str::random(50),
            'image_path' => 'https://fumika01.s3.amazonaws.com/contents/image/6ORQTLkoQqGM2lD2fx7WrCPN2bn36IHNxe5EZdrf.jpg',
            'user_id' => 2,
            'category_id' => 4,
            'created_at' => '2021-12-15 11:55:12',
            'updated_at' => '2021-12-15 11:55:12',
            'deleted_at' => NULL,
        ]);
        DB::table('posts')->insert([
            'id' => 5,
            'title' => 'ローマ風建物',
            'body' => Str::random(60),
            'image_path' => 'https://fumika01.s3.amazonaws.com/contents/image/MCkmUN7HnEPydO5AeMynwuEpIQgJVkg4FPWK9YO6.png',
            'user_id' => 2,
            'category_id' => 3,
            'created_at' => '2021-12-15 11:56:27',
            'updated_at' => '2021-12-15 11:56:27',
            'deleted_at' => NULL,
        ]);
    }
}
