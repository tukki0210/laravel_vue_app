<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

// Laravel9ではModelsフォルダの中に変更されている
use App\Models\Book;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class BooksTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // テスト開始の度にDBを作り直す
    use DatabaseMigrations;

    public function test_booksAPI()
    {
        // P346を参考にBookモデルからダミーデータを作る
        Book::factory()->create([
            'title' => 'スッキリJava',
            'author' => 'test',
            'publisherName' => '技術評論社',
            'isbn' => '11111111',
            'itemCaption'=>'test',
            'gunre'=>'Java',
            'largeImageUrl'=>'http://exsample.com',
            'mediumImageUrl'=>'http://exsample.com',
            'available'=>true
        ]);

        // Book::factory(10)->create();

        $this->assertDatabaseHas('books',[
            'title' => 'スッキリJava',
            'author' => 'test',
            'publisherName' => '技術評論社',
            'isbn' => '11111111',
            'itemCaption'=>'test',
            'gunre'=>'Java',
            'largeImageUrl'=>'http://exsample.com',
            'mediumImageUrl'=>'http://exsample.com',
            'available'=>true
        ]);
    }
}
