<?php

// DBに登録されているデータを取得する

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
// Modelを介することでSQL文を組み立てることなくtodosテーブルを操作できる
// → TodoController.phpにてTodoModelを使えるようにインスタンス化
{
    protected $table = 'todos';

    protected $fillable = [
        'content',
        // 画面の入力項目が増減しても常に同じコードで登録処理が実現
        // $fillable : fill()によってModelに代入可能なプロパティを記述
    ];
    // protected : このプロパティやメソッドは、現在のクラスや、そのクラスを継承したクラスからアクセスできるが、外部からはアクセスできない
}
