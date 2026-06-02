<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * アプリ全体の Seeder を呼び出す場所です。
     *
     * ここには直接データをたくさん書かず、TodoSeeder のような
     * 目的別の Seeder を呼び出すだけにすると見通しが良くなります。
     */
    public function run(): void
    {
        $this->call([
            TodoSeeder::class,
        ]);
    }
}
