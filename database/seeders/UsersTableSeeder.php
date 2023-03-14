<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'テストユーザー',
            'email' => 'test@mail.com',
            'password' => bcrypt(1111)
        ];
        DB::table('users')->insert($param);

        $faker = \Faker\Factory::create('ja_JP');
        for ($i = 0; $i < 10; $i++){
        $param = [
            'name' => $faker->name(),
            'email' => $faker->email(),
            'password' => $faker->password(),
        ];
        DB::table('users')->insert($param);
        }
    }
}
