<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // 主キーの列名を指定
    protected $primaryKey = 'book_id';

    // 入力可能な列名を指定（これら以外はDBで自動入力）
    protected $fillable = [
        'title',
        'author',
        'publisherName',
        'isbn',
        'itemCaption',
        'gunre',
        'largeImageUrl',
        'mediumImageUrl',
        'available'
      ];
}
