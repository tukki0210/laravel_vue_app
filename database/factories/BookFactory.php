<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => 'スッキリJava',
            'author' => $this->faker->name(),
            'publisherName' => $this->faker->company(),
            'isbn' => $this->faker->isbn13(),
            'itemCaption'=>'test',
            'gunre'=>'Java',
            'largeImageUrl'=>'http://exsample.com',
            'mediumImageUrl'=>'http://exsample.com',
            'available'=>true
        ];
    }
}
