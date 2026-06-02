@extends('layouts.app')

@section('content')
    {{-- Todo 一覧画面です。追加フォームと一覧を同じ画面に表示します。 --}}
    <section class="page-header">
        <div>
            <p class="eyebrow">Beginner Laravel</p>
            <h1>Todo リスト</h1>
            <p class="lead">Laravel の CRUD を、Model / Controller / Service / Repository / Blade で学ぶための画面です。</p>
        </div>
    </section>

    {{-- Controller から with('message', ...) で渡された完了メッセージを表示します。 --}}
    @if (session('message'))
        <div class="notice" role="status">{{ session('message') }}</div>
    @endif

    {{-- 新しい Todo を作るフォームです。送信先は TodoController の store メソッドです。 --}}
    <section class="panel">
        <h2>Todo を追加</h2>

        <form class="todo-form" action="{{ route('todos.store') }}" method="post">
            @csrf

            {{-- 入力欄は編集画面でも使うので、共通部品として partial に分けています。 --}}
            @include('todos.partials.fields', ['todo' => null])

            <div class="form-actions">
                <button class="button primary" type="submit">追加する</button>
            </div>
        </form>
    </section>

    <section class="panel">
        <div class="section-heading">
            <h2>一覧</h2>
            <span class="count">{{ $todos->count() }} 件</span>
        </div>

        @if ($todos->isEmpty())
            {{-- Todo が 0 件のときだけ表示されます。 --}}
            <p class="empty">まだ Todo がありません。最初の Todo を追加してください。</p>
        @else
            <ul class="todo-list">
                @foreach ($todos as $todo)
                    {{-- 1 件分の Todo を表示します。完了済みなら is-done クラスが付きます。 --}}
                    <li class="todo-item {{ $todo->is_done ? 'is-done' : '' }}">
                        <div class="todo-main">
                            {{-- 完了 / 未完了を切り替えるフォームです。 --}}
                            <form action="{{ route('todos.toggle', $todo) }}" method="post">
                                @csrf
                                @method('PATCH')
                                <button class="check-button" type="submit" aria-label="完了状態を切り替える">
                                    {{ $todo->is_done ? '✓' : '' }}
                                </button>
                            </form>

                            <div class="todo-text">
                                <h3>{{ $todo->title }}</h3>
                                @if ($todo->memo)
                                    <p>{{ $todo->memo }}</p>
                                @endif
                                <div class="meta">
                                    <span>{{ $todo->is_done ? '完了' : '未完了' }}</span>
                                    @if ($todo->due_date)
                                        <span>期限: {{ $todo->due_date->format('Y-m-d') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="todo-actions">
                            {{-- 編集画面へ移動します。 --}}
                            <a class="button secondary" href="{{ route('todos.edit', $todo) }}">編集</a>

                            {{-- 削除フォームです。JS で確認ダイアログを出します。 --}}
                            <form action="{{ route('todos.destroy', $todo) }}" method="post" data-confirm-delete>
                                @csrf
                                @method('DELETE')
                                <button class="button danger" type="submit">削除</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </section>
@endsection
