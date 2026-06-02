@extends('layouts.app')

@section('content')
    {{-- Todo 編集画面です。既存の Todo を更新します。 --}}
    <section class="page-header">
        <div>
            <p class="eyebrow">Edit Todo</p>
            <h1>Todo を編集</h1>
            <p class="lead">入力、更新、バリデーション、リダイレクトの流れを確認できます。</p>
        </div>
    </section>

    <section class="panel">
        {{-- 送信先は TodoController の update メソッドです。 --}}
        <form class="todo-form" action="{{ route('todos.update', $todo) }}" method="post">
            @csrf
            @method('PUT')

            {{-- 追加画面と同じ入力欄を使います。 --}}
            @include('todos.partials.fields', ['todo' => $todo])

            {{-- 完了済みにするかどうかを選ぶチェックボックスです。 --}}
            <label class="checkbox-row">
                <input type="checkbox" name="is_done" value="1" @checked(old('is_done', $todo->is_done))>
                <span>完了にする</span>
            </label>

            <div class="form-actions">
                <a class="button secondary" href="{{ route('todos.index') }}">戻る</a>
                <button class="button primary" type="submit">更新する</button>
            </div>
        </form>
    </section>
@endsection
