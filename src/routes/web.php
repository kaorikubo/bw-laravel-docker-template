<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// 一覧画面のURIの設定
// ルート定義 : URIとHTTPメソッドの組み合わせで実行する処理を指定すること
// 保守性の観点から処理はControllerに移して実行(TodoController.php)


Route::get('/', function () {
    return view('welcome');
});
// Route::get() : HTTPメソッドのGETを示しており
// → 第一引数 : URI
// → 第二引数 : そのURIとHTTPメソッドの組み合わせで実行したい処理を記述

Route::get('/todo', 'TodoController@index')->name('todo.index');
// 一覧表示および一覧画面にリダイレクト

Route::get('/todo/create', 'TodoController@create')->name('todo.create');
// 新規作成画面のルートの設定

Route::post('/todo', 'TodoController@store')->name('todo.store');
// 新規作成 : ToDoを新規作成するのでPOSTメソッド
// → TodoController.phpにメソッドを定義

// リファクタリング : コードの動作を変えずに内部の構造を改善することで、可読性、保守性、効率性を向上させるプロセス
// ルートの定義に->name('ルート名')を記述して名前付きルートを定義


Route::get('/todo/{id}', 'TodoController@show')->name('todo.show');