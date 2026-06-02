<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use App\Services\TodoService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Todo 画面からのリクエストを受け取る Controller です。
 *
 * Controller は「画面を表示する」「フォームの送信を受け取る」
 * 「処理後にどの画面へ戻すか」を担当します。
 */
class TodoController extends Controller
{
    /**
     * TodoController を作るときに、TodoService を受け取ります。
     *
     * Laravel が自動で TodoService を用意して渡してくれます。
     */
    public function __construct(
        private readonly TodoService $todoService,
    ) {
    }

    /**
     * Todo 一覧画面を表示します。
     *
     * @return View Todo 一覧の Blade
     */
    public function index(): View
    {
        // Service から Todo 一覧を受け取り、Blade に渡します。
        return view('todos.index', [
            'todos' => $this->todoService->list(),
        ]);
    }

    /**
     * 新しい Todo を保存します。
     *
     * @param TodoRequest $request チェック済みのフォーム入力
     * @return RedirectResponse 保存後に一覧画面へ戻るレスポンス
     */
    public function store(TodoRequest $request): RedirectResponse
    {
        // 入力チェック済みのデータだけを Service に渡して保存します。
        $this->todoService->create($request->validated());

        return redirect()->route('todos.index')->with('message', 'Todo を追加しました。');
    }

    /**
     * Todo 編集画面を表示します。
     *
     * @param Todo $todo 編集したい Todo
     * @return View Todo 編集の Blade
     */
    public function edit(Todo $todo): View
    {
        // URL の {todo} から Laravel が自動で Todo を探して渡してくれます。
        return view('todos.edit', [
            'todo' => $todo,
        ]);
    }

    /**
     * 既存の Todo を更新します。
     *
     * @param TodoRequest $request チェック済みのフォーム入力
     * @param Todo $todo 更新したい Todo
     * @return RedirectResponse 更新後に一覧画面へ戻るレスポンス
     */
    public function update(TodoRequest $request, Todo $todo): RedirectResponse
    {
        // 編集画面から送られた内容で Todo を更新します。
        $this->todoService->update($todo, $request->validated());

        return redirect()->route('todos.index')->with('message', 'Todo を更新しました。');
    }

    /**
     * Todo の完了 / 未完了を切り替えます。
     *
     * @param Todo $todo 状態を切り替えたい Todo
     * @return RedirectResponse 切り替え後に一覧画面へ戻るレスポンス
     */
    public function toggle(Todo $todo): RedirectResponse
    {
        // 完了 / 未完了だけを切り替えます。
        $this->todoService->toggle($todo);

        return redirect()->route('todos.index')->with('message', '状態を変更しました。');
    }

    /**
     * Todo を削除します。
     *
     * @param Todo $todo 削除したい Todo
     * @return RedirectResponse 削除後に一覧画面へ戻るレスポンス
     */
    public function destroy(Todo $todo): RedirectResponse
    {
        // 削除ボタンが押された Todo を削除します。
        $this->todoService->delete($todo);

        return redirect()->route('todos.index')->with('message', 'Todo を削除しました。');
    }

}
