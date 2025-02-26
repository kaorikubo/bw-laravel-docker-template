<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
// TodoSeeder.phpのシーダークラスをcallメソッドに登録して実行
// php artisan db:seed : 左のコマンドでcallメソッドを実行

{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TodoSeeder::class,
        ]);
    }
}
