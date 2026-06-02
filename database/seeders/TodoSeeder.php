<?php

namespace Database\Seeders;

use App\Models\Todo;
use Illuminate\Database\Seeder;

/**
 * Todo のサンプルデータを作る場所です。
 *
 * Seeder は、開発中に使う初期データを用意するためのファイルです。
 * `php artisan migrate --seed` や `./reset-db.sh` を実行すると、
 * このファイルの内容をもとに Todo が作られます。
 */
class TodoSeeder extends Seeder
{
    /**
     * Todo のサンプルデータを登録します。
     *
     * @return void
     */
    public function run(): void
    {
        // firstOrCreate は「同じ title がなければ作る」という命令です。
        // setup.sh を何度実行しても、同じ Todo が増え続けないようにしています。
        Todo::query()->firstOrCreate(
            ['title' => 'Todo 一覧を表示する'],
            [
                'memo' => 'Seeder から作られたサンプルデータです。',
                'is_done' => true,
                'due_date' => now()->toDateString(),
            ],
        );

        Todo::query()->firstOrCreate(
            ['title' => '新しい Todo を追加する'],
            [
                'memo' => 'フォームから保存する流れを確認します。',
                'is_done' => false,
                'due_date' => now()->addDay()->toDateString(),
            ],
        );

        Todo::query()->firstOrCreate(
            ['title' => '編集と削除を試す'],
            [
                'memo' => 'Controller、Service、Repository の役割を追いながら動かします。',
                'is_done' => false,
                'due_date' => now()->addDays(3)->toDateString(),
            ],
        );
    }
}
