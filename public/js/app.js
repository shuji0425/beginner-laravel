/*
 * Todo 画面で使う JavaScript です。
 *
 * 今は「削除前の確認」と「メモの文字数カウント」だけを担当します。
 * Laravel の保存処理は PHP 側で行うので、JS は補助的な役割です。
 */
document.addEventListener('DOMContentLoaded', () => {
    // data-confirm-delete が付いたフォームは、送信前に確認ダイアログを出します。
    document.querySelectorAll('[data-confirm-delete]').forEach((form) => {
        form.addEventListener('submit', (event) => {
            if (!window.confirm('この Todo を削除しますか？')) {
                event.preventDefault();
            }
        });
    });

    // data-character-count が付いた textarea の文字数を表示します。
    document.querySelectorAll('[data-character-count]').forEach((textarea) => {
        const output = textarea
            .closest('.field')
            ?.querySelector('[data-character-count-output]');

        // 入力のたびに、現在の文字数を画面へ反映します。
        const updateCount = () => {
            if (output) {
                output.textContent = textarea.value.length;
            }
        };

        textarea.addEventListener('input', updateCount);
        updateCount();
    });
});
