@php
    // この partial は、追加画面と編集画面の両方で使う入力欄です。
    // old() は、バリデーションエラーで戻ってきたときに前回の入力を残すために使います。
    $titleValue = old('title', $todo?->title);
    $memoValue = old('memo', $todo?->memo);
    $dueDateValue = old('due_date', $todo?->due_date?->format('Y-m-d'));
@endphp

{{-- Todo のタイトルです。required があるので空では送信できません。 --}}
<div class="field">
    <label for="title">タイトル</label>
    <input id="title" name="title" type="text" value="{{ $titleValue }}" maxlength="80" required autofocus>
    @error('title')
        <p class="error">{{ $message }}</p>
    @enderror
</div>

{{-- Todo の補足メモです。任意入力なので空でも保存できます。 --}}
<div class="field">
    <label for="memo">メモ</label>
    <textarea id="memo" name="memo" rows="4" maxlength="1000" data-character-count>{{ $memoValue }}</textarea>
    <p class="hint"><span data-character-count-output>0</span> / 1000 文字</p>
    @error('memo')
        <p class="error">{{ $message }}</p>
    @enderror
</div>

{{-- Todo の期限です。日付を入れなくても保存できます。 --}}
<div class="field">
    <label for="due_date">期限</label>
    <input id="due_date" name="due_date" type="date" value="{{ $dueDateValue }}">
    @error('due_date')
        <p class="error">{{ $message }}</p>
    @enderror
</div>
