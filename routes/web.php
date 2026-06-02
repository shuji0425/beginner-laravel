<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| ブラウザからアクセスする URL と Controller をつなぐ場所です。
| 例: GET / にアクセスされたら TodoController の index メソッドを動かします。
|
*/

// Todo 一覧画面を表示します。トップページとして使います。
Route::get('/', [TodoController::class, 'index'])->name('todos.index');

// 入力フォームから送られた Todo を保存します。
Route::post('/todos', [TodoController::class, 'store'])->name('todos.store');

// 既存の Todo を編集する画面を表示します。
Route::get('/todos/{todo}/edit', [TodoController::class, 'edit'])->name('todos.edit');

// 編集フォームから送られた内容で Todo を更新します。
Route::put('/todos/{todo}', [TodoController::class, 'update'])->name('todos.update');

// 完了 / 未完了を切り替えます。
Route::patch('/todos/{todo}/toggle', [TodoController::class, 'toggle'])->name('todos.toggle');

// Todo を削除します。
Route::delete('/todos/{todo}', [TodoController::class, 'destroy'])->name('todos.destroy');
