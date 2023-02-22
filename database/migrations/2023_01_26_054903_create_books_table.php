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
        Schema::create('books', function (Blueprint $table) {
            $table->increments('book_id');
            $table->string('title');
            $table->string('author');
            $table->string('publisherName');
            $table->string('isbn');
            $table->string('itemCaption');
            // gunreは追加時に自分で設定する
            // 楽天APIには無いのでnullを許可する
            $table->string('gunre')->nullable();
            $table->string('largeImageUrl');
            $table->string('mediumImageUrl');
            $table->boolean('available');
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
        Schema::dropIfExists('books');
    }
};
