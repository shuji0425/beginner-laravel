<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * todos テーブルを作成します。
     *
     * @return void
     */
    public function up(): void
    {
        // migrations はデータベースのテーブル構造を作る場所です。
        // この up メソッドには「作る内容」を書きます。
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('memo')->nullable();
            $table->boolean('is_done')->default(false);
            $table->date('due_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * todos テーブルを削除します。
     *
     * @return void
     */
    public function down(): void
    {
        // down メソッドには「元に戻す内容」を書きます。
        Schema::dropIfExists('todos');
    }
};
