<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

/**
 * Todo テーブルの 1 行を表す Model です。
 *
 * Model は、データベースのデータを PHP のオブジェクトとして扱う場所です。
 * Controller や Repository から Todo::query() のように呼び出して使います。
 */
#[Fillable(['title', 'memo', 'is_done', 'due_date'])]
class Todo extends Model
{
    /**
     * データベースから取り出した値を、PHP で扱いやすい型に変換します。
     *
     * is_done は true / false、due_date は日付として扱えるようにしています。
     */
    protected function casts(): array
    {
        return [
            'is_done' => 'boolean',
            'due_date' => 'date',
        ];
    }
}
