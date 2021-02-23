<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    //todosテーブルのidを保護する
    protected $guarded = array('id');

    //todosテーブルのバリデーションルール
    public static $rules = array(
        'text' => 'required'//未入力チェック
    );

    //usersテーブルと結合リレーション
    public function user() {
        return $this->belongsTo('App\user');
    }
}
