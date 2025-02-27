<?php

namespace App\Http\Controllers;
// namespace : クラスや関数、定数などの名前を識別するためのグループ化

use App\Http\Requests\TodoRequest;
use App\Todo;
// use : 他の名前空間にあるクラスを現在のファイルにインポートするためのキーワード
// TodoModelインスタンス化においてのパス


class TodoController extends Controller
// web.phpで作成した処理の実行
{
    private $todo;

    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    public function index()
    {
        $todos = $this->todo->all();
        // todosテーブルのレコードを全件取得
        // ORMによってSQL文を書く必要がない

        // dd($todos);
        // → dd() : Laravelでのデバッグ関数

        return view('todo.index', ['todos' => $todos]);
        // view関数 : bladeファイルから表示したいHTMLを指定
        // → resources/views/から対象の*.blade.phpまでの相対パスを.区切りで指定
        // 取得したデータを画面に渡す : ['todos' => $todos]
        // 第二引数の連想配列 : [blade内での変数名 => 代入したい値]
    }

    public function create()
    // 新規作成画面のルートに対応するControllerのメソッドを定義
    // create.blade.php : Controllerから呼び出すために必要なViewを記載
{
    return view('todo.create'); 
    // view()を使用してControllerから実行しHTML(create.blade.php)を生成

}

public function store(TodoRequest $request)
// ToDoの新規作成(POSTメソッドより)
// $requestにRequestクラスのインスタンスを代入 = メソッドインジェクション
// → 入力画面に入力した内容を$requestに代入&取得
{
    $inputs = $request->all();
    // dd($inputs);
    // Requestクラスの->all()を使用して、フォームから送信された値を一括取得

    $this->todo->fill($inputs);
    // todosテーブルの1レコードを表すTodoクラスをインスタンス化
    // ->fill()を使用してTodoインスタンスの各プロパティに一括で代入
    // ->fill() : $todo->{連想配列のkey} = {連想配列のvalue}を配列のすべての要素に行う
    $this->todo->save();
    // ->save()を実行してオブジェクトの状態をDBに保存するINSERT文を実行

    return redirect()->route('todo.index');
    // 一覧画面にリダイレクト

}

public function show($id)
{
    $todo = $this->todo->find($id);
    return view('todo.show', ['todo' => $todo]);
}

public function edit($id)
{
    $todo = $this->todo->find($id);
    return view('todo.edit', ['todo' => $todo]);
}

public function update(TodoRequest $request, $id)
 // 第1引数: リクエスト情報の取得　第2引数: ルートパラメータの取得
{
    $inputs = $request->all();
    $todo = $this->todo->find($id);
    $todo->fill($inputs)->save();

    return redirect()->route('todo.show', $todo->id);
}

public function delete($id)
{
    // dd('削除のルート実行！');
    $todo = $this->todo->find($id);
    $todo->delete();

    return redirect()->route('todo.index');
}

}


