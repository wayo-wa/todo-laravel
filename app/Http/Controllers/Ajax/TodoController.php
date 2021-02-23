<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    //todoデータ：取得
    public function index() {
        $todos = Auth::user()->todos()->orderBy('created_at', 'desc')->get();
        return $todos;
    }

    //todoデータ：登録
    public function add(Request $request) {
        //todo-modelで定義したバリデーションチェック
        $this->validate($request, Todo::$rules);
        //todo-modelのインスタンスを作成する
        $todo = new Todo();
        //request情報
        $form = $request->all;
        //CSRF用非表示フィールドの削除
        unset($form['_token']);
        //todoをDBに書き込む
        Auth::user()->todos()->save($todo->fill($request->all()));
        $todos = Auth::user()->todos()->orderBy('created_at', 'desc')->get();
        return $todos;
    }

    //todoデータ：編集
    public function edit(int $id,Request $request) {
        //Todo-modelで定義したバリデーションチェック
        $this->validate($request, Todo::$rules);
        //Todo.idでデータ抽出
        $todo = Todo::find($id);
        //request情報
        $form = $request->all;
        //CSRF用非表示フィールドの削除
        unset($form['_token']);
        //TodoをDBに書き込む
        Auth::user()->todos()->save($todo->fill($request->all()));
        $todos = Auth::user()->todos()->orderBy('created_at', 'desc')->get();
        return $todos;
    }

    //todoデータ：削除
    public function delete($id) {
        $todo = Todo::find($id);
        $todo->delete();
        return response()->json([
            'success' => 'todo削除成功'
        ]);
    }
}
