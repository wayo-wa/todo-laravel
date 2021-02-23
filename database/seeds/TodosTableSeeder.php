<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => '1',
            'text' => 'Laravelとvue.jsアウトプットを終われせる',
            'created_at' => carbon::now(),
            'updated_at' => carbon::now(),
        ];
        DB::table('todos')->insert($param);

        $param = [
            'user_id' => '2',
            'text' => 'ヨガを始める',
            'created_at' => carbon::now(),
            'updated_at' => carbon::now(),
        ];
        DB::table('todos')->insert($param);

        $param = [
            'user_id' => '1',
            'text' => 'デザインを勉強する',
            'created_at' => carbon::now(),
            'updated_at' => carbon::now(),
        ];
        DB::table('todos')->insert($param);
    }
}
