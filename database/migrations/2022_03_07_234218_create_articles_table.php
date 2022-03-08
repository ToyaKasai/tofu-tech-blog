<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50); // 記事タイトル
            $table->string('description', 255); // 記事説明文
            $table->string('thumbnail_path', 255); // 記事サムネイルパス
            $table->longText('source'); // マークダウン
            $table->boolean('is_save'); // お気に入り可否
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
};
