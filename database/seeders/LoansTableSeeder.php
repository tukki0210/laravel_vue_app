<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'book_id'=> '1',
            'user_id'=> '1',
            'loan_date'=>'2023-02-01',
            'return_date'=>'2023-02-15'
        ];
        DB::table('loans')->insert($param);
    }
}
