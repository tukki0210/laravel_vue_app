<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // $this->call(BooksTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        // $this->call(LoansTableSeeder::class);
    }
}