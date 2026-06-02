<?php

namespace App\Repositories;

use App\Models\Todo;
use Illuminate\Database\Eloquent\Collection;

/**
 * Todo のデータベース操作をまとめる場所です。
 *
 * Repository は「DB から取る」「DB に保存する」など、
 * データの出し入れを担当します。
 */
class TodoRepository
{
    /**
     * Todo を一覧表示用の順番で取得します。
     *
     * @return Collection<int, Todo>
     */
    public function all(): Collection
    {
        return Todo::query()
            ->orderBy('is_done')
            ->orderByRaw('due_date is null')
            ->orderBy('due_date')
            ->latest()
            ->get();
    }

    /**
     * 新しい Todo を保存します。
     *
     * @param array<string, mixed> $data
     */
    public function create(array $data): Todo
    {
        return Todo::query()->create($data);
    }

    /**
     * 既存の Todo を更新します。
     *
     * @param array<string, mixed> $data
     */
    public function update(Todo $todo, array $data): Todo
    {
        $todo->update($data);

        return $todo;
    }

    /**
     * Todo を削除します。
     *
     * @param Todo $todo 削除したい Todo
     */
    public function delete(Todo $todo): void
    {
        // delete はデータベースから 1 件削除する命令です。
        $todo->delete();
    }
}
