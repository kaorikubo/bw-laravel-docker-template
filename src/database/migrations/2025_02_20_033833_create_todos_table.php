<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodosTable extends Migration
{
    /**
     * // マイグレーション
     * // Migration : データベースの構造を管理する仕組み
     * // → SQLを使用するのではなく、マイグレーションファイルを作成してLaravelコマンド(artisan)で実行
     * // → マイグレーションファイルをGitで共有できるので開発者全員が同じテーブルを作成することができる
     */
    
    /**
     * Run the migrations.
     * // テーブルの追加
     * // php artisan migrate → 先のコマンドでマイグレーションを実行
     *
     * @return void
     */


    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * // テーブルの削除
     * // php artisan migrate:rollback → マイグレーションをもとに戻すコマンドで実行
     * // downメソッドの場合は「rollback」コマンドで実行
     *
     * @return void
     */

    public function down()
    {
        Schema::dropIfExists('todos');
    }
}
