<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    // 主キーの列名を指定
    protected $primaryKey = 'loan_id';

    // 入力可能な列名を指定（これら以外はDBで自動入力）
    protected $fillable = [
        'book_id',
        'user_id',
        'loan_date',
        'return_date'
      ];

}
