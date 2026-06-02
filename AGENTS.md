# AIエージェント向けルール

このリポジトリは、初学者が AI と一緒に Laravel を学ぶための教材です。

AI エージェントは、作業前に [docs/ai-guidelines.md](docs/ai-guidelines.md) を読んでください。

## 基本方針

- 初学者が理解できる説明を優先してください。
- 専門用語は使ってよいですが、初回は短く説明してください。
- 変更は小さな単位で進め、何を変えたかを明確にしてください。
- 実装後は「何をしたか」「なぜそうしたか」「どのファイルが何を担当するか」を説明してください。
- 実務でよく見かける考え方も伝えてください。ただし「必ずこう」と断定しないでください。
- `logs/` は個人用の学習履歴置き場です。Git のコミット対象にしないでください。

## Skill の扱い

Codex を使う場合は、必要に応じて `.codex/skills` を参照してください。

- `.codex/skills/summarize-learning-log`
- `.codex/skills/advise-next-implementation`
- `.codex/skills/explain-beginner-changes`

Codex 以外の AI を使う場合も、上記 skill の内容を参考にして、同じ方針で初心者向けに説明してください。

別の AI ツールが専用の instruction ファイルを使う場合は、ユーザーに確認してから、このルールをその AI が読みやすい場所へコピーしてください。
