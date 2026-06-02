<?php

namespace App\Services;

use App\Models\Todo;
use App\Repositories\TodoRepository;
use Illuminate\Database\Eloquent\Collection;

/**
 * Todo の業務ルールをまとめる場所です。
 *
 * Service は Controller と Repository の間に入り、
 * 「保存前にどう加工するか」「完了状態をどう切り替えるか」などを担当します。
 */
class TodoService
{
    /**
     * TodoService を作るときに、TodoRepository を受け取ります。
     *
     * Laravel が自動で TodoRepository を用意して渡してくれます。
     */
    public function __construct(
        private readonly TodoRepository $todoRepository,
    ) {
    }

    /**
     * 画面に表示する Todo 一覧を取得します。
     *
     * @return Collection<int, Todo>
     */
    public function list(): Collection
    {
        return $this->todoRepository->all();
    }

    /**
     * 新しい Todo を作ります。
     *
     * 追加直後の Todo は、必ず未完了から始めるようにしています。
     *
     * @param array<string, mixed> $data
     */
    public function create(array $data): Todo
    {
        $data['is_done'] = false;

        return $this->todoRepository->create($data);
    }

    /**
     * Todo の入力内容を更新します。
     *
     * チェックボックスは未チェックだと値が送られてこないため、
     * ここで false に変換しています。
     *
     * @param array<string, mixed> $data
     */
    public function update(Todo $todo, array $data): Todo
    {
        $data['is_done'] = (bool) ($data['is_done'] ?? false);

        return $this->todoRepository->update($todo, $data);
    }

    public function toggle(Todo $todo): Todo
    {
        // 今の状態を反転させます。true なら false、false なら true になります。
        return $this->todoRepository->update($todo, [
            'is_done' => ! $todo->is_done,
        ]);
    }

    /**
     * Todo を削除します。
     *
     * @param Todo $todo 削除したい Todo
     */
    public function delete(Todo $todo): void
    {
        $this->todoRepository->delete($todo);
    }
}
