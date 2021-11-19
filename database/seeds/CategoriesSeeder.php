<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id' => 1,
            'category_name' => 'カテゴリ',
        ]);
        DB::table('categories')->insert([
            'id' => 2,
            'category_name' => '＜モデル＞',
        ]);
        DB::table('categories')->insert([
            'id' => 3,
            'category_name' => 'モデル（背景）',
        ]);
        DB::table('categories')->insert([
            'id' => 4,
            'category_name' => 'モデル（キャラクター）',
        ]);DB::table('categories')->insert([
            'id' => 5,
            'category_name' => 'モデル（モノ）',
        ]);
        DB::table('categories')->insert([
            'id' => 6,
            'category_name' => 'モデル（乗り物）',
        ]);
        DB::table('categories')->insert([
            'id' => 7,
            'category_name' => 'モデル（食べ物）',
        ]);
        DB::table('categories')->insert([
            'id' => 8,
            'category_name' => '＜アニメーション＞',
        ]);
        DB::table('categories')->insert([
            'id' => 9,
            'category_name' => 'アニメーション（日常）',
        ]);
        DB::table('categories')->insert([
            'id' => 10,
            'category_name' => 'アニメーション（格闘）',
        ]);
        DB::table('categories')->insert([
            'id' => 11,
            'category_name' => 'アニメーション（フェイス）',
        ]);
        DB::table('categories')->insert([
            'id' => 12,
            'category_name' => 'アニメーション（トレス）',
        ]);
        DB::table('categories')->insert([
            'id' => 13,
            'category_name' => 'ポーズ（オリジナル）',
        ]);
        DB::table('categories')->insert([
            'id' => 14,
            'category_name' => 'ポーズ（トレス）',
        ]);
        DB::table('categories')->insert([
            'id' => 15,
            'category_name' => '＜スクリプト＞',
        ]);
        DB::table('categories')->insert([
            'id' => 16,
            'category_name' => 'スクリプト',
        ]);
    }
}
