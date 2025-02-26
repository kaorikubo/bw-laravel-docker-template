<?php

// シーダー
// → データベースに初期データを自動的に挿入するための仕組み
// → 新しい開発環境などのデータをセットアップ時に便利(実行するだけで必要なデータが挿入される)
// → SQLを直接書かずにPHPコードで表現可能
// → Git管理&テストデータを開発者に共有できる


use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
// シーダークラスはcallメソッドに登録し実行できる
// → DatabaseSeeder.php
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    // runメソッド : 
    {
        DB::table('todos')->truncate();
        // truncateメソッド : 該当のテーブルのレコードをすべて削除する
        // → 開発者間のテストデータに差異が生じないようにするため、元々テーブルに存在していたデータを削除後にテストデータを投入する
        
        $testData = [
            [
                'content' => 'PHP Appセクションを終える',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'content' => 'Laravel Lessonを終える',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('todos')->insert($testData);
    }
}
