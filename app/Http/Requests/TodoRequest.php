<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Todo フォームの入力チェックを行う FormRequest です。
 *
 * FormRequest は、Controller からバリデーション処理を分けるための場所です。
 * 「どの項目が必須か」「何文字まで入力できるか」などをここに書きます。
 */
class TodoRequest extends FormRequest
{
    /**
     * このリクエストを実行できるかを決めます。
     *
     * 今回はログイン機能がないため、常に true にしています。
     *
     * @return bool true の場合、このフォーム送信を許可します。
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Todo フォームの入力ルールを返します。
     *
     * @return array<string, array<int, string>> 入力項目ごとのバリデーションルール
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:80'],
            'memo' => ['nullable', 'string', 'max:1000'],
            'due_date' => ['nullable', 'date'],
            'is_done' => ['nullable', 'boolean'],
        ];
    }
}
