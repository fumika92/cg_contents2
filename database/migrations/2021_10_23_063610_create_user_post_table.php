<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_post', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unSignedBigInteger('user_id');
            $table->unSignedBigInteger('post_id');
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->inDelete('cascade'); //userが消えた時は消す
            $table->foreign('post_id')->references('id')->on('posts')->inDelete('cascade'); //postが消えた時も消す
            
            $table->unique(['user_id', 'post_id']); //一つの投稿に一つのユーザーが一つだけいいねを押せる
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_post');
    }
}
