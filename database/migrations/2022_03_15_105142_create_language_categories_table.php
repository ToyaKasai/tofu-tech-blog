<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('language_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50); // カテゴリタイトル
            $table->string('thumbnail_path_src', 255); // カテゴリサムネイルsrc
            $table->string('thumbnail_path_alt', 255); // カテゴリサムネイルalt
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
        Schema::dropIfExists('language_categories');
    }
};
