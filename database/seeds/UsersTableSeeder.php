<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
            'name' => 'taro',
            'email' => 'taro@com',
            'password' => bcrypt('11111111'),
            'created_at' => carbon::now(),
            'updated_at' => carbon::now(),
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => 'hanako',
            'email' => 'hanako@com',
            'password' => bcrypt('22222222'),
            'created_at' => carbon::now(),
            'updated_at' => carbon::now(),
        ];
        DB::table('users')->insert($param);
    }
}
