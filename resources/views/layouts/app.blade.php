<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title ?? 'Todo List' }}</title>
        {{-- 全画面で共通して使う CSS と JS を読み込みます。 --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>
        <main class="app-shell">
            {{-- 各画面の中身は、ここに差し込まれます。 --}}
            @yield('content')
        </main>
    </body>
</html>
