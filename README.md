# Beginner Laravel

低スペックの PC でも触りやすい、Laravel 入門用の開発環境です。

このプロジェクトでは、Laravel の基本を学ぶために Todo リストの CRUD 処理を作っていく想定です。
データベースは SQLite を使い、初期データは Seeder で作る方針です。

## AI と一緒に学ぶための方針

このリポジトリには、AI が初学者向けに説明しやすくするためのルールを用意しています。

- [AGENTS.md](AGENTS.md): Codex などの AI エージェント向け入口
- [CLAUDE.md](CLAUDE.md): Claude 向け入口
- [docs/ai-guidelines.md](docs/ai-guidelines.md): 共通の学習支援ルール
- [.codex/skills](.codex/skills): Codex 用の学習支援 skill

AI に依頼するときは、次のように伝えると、この教材の方針に沿って手伝ってもらいやすくなります。

```text
このリポジトリは初学者向けの Laravel 教材です。
AGENTS.md と docs/ai-guidelines.md を読んで、初心者にも分かるように説明しながら手伝ってください。
実務でよく見かける考え方も、断定しすぎずに補足してください。
```

## 準備で困ったら

PHP、Composer、Git のインストールや、この README の手順で分からないことがあれば、AI に手伝ってもらってください。

まずは次のように聞くと進めやすいです。

例:

```text
Laravelを始めたい初心者です。
このREADMEを手順通りに進めたいです。
今どこから始めればいいか、1つずつ確認しながら手伝ってください。

リポジトリURL:
https://github.com/shuji0425/beginner-laravel
```

インストール画面や公式サイトで迷った場合は、その URL を貼ってください。
エラーが出た場合は、実行したコマンドとエラー内容をそのまま貼ると、原因を一緒に確認しやすくなります。

## 最初に必要なもの

- PHP
- Composer
- Git

Node.js / npm は最初は使いません。
SQLite を使うため、MySQL は不要です。
画面を表示して Laravel を学ぶだけなら、軽い構成で始められます。

## PHP / Composer / Git の準備

まず、ターミナルで次のコマンドを実行して、入っているか確認します。

```bash
php --version
composer --version
git --version
```

バージョンが表示されれば準備できています。
`command not found` のように表示された場合は、足りないものをインストールしてください。

### macOS の場合

Homebrew が入っている場合は、次のコマンドで入れられます。

```bash
brew install php composer git
```

Homebrew が入っていない場合は、先に Homebrew を入れてください。

### Windows の場合

次のものをインストールしてください。

- PHP
- Composer
- Git for Windows

インストール後、新しいターミナルを開いて、もう一度確認します。

```bash
php --version
composer --version
git --version
```

このプロジェクトでは SQLite を使うため、XAMPP や MySQL は不要です。

## プロジェクトを取得する

GitHub からプロジェクトを取得します。

```bash
git clone https://github.com/shuji0425/beginner-laravel.git
cd beginner-laravel
```

## 初回セットアップ

まず、セットアップ用のファイルを実行できるようにします。

```bash
chmod +x setup.sh start.sh reset-db.sh
```

そのあと、初回セットアップを実行します。

```bash
./setup.sh
```

自動で次のことを行います。

- `.env` がなければ作成
- SQLite データベースを作成
- Laravel のアプリキーを作成
- データベースの初期設定
- Seeder の実行
- ブラウザで `http://127.0.0.1:8000` を開く
- Laravel の開発サーバーを起動

終了するときは、ターミナルで `Ctrl + C` を押してください。

## 2回目以降の起動

初回セットアップが終わっている場合は、サーバーだけ起動します。

```bash
./start.sh
```

## ポートを変えたいとき

8000 番ポートが使われている場合は、別の番号で起動できます。

```bash
PORT=8001 ./start.sh
```

初回セットアップ時に変えたい場合は、次のようにします。

```bash
PORT=8001 ./setup.sh
```

## 作業用ブランチを作る

変更を始める前に、作業用ブランチを作ります。

```bash
git switch -c my-first-todo
```

いまの状態を確認したいときは、次のコマンドを使います。

```bash
git status
```

## 変更を保存する

作業が一区切りついたら、変更を Git に保存します。

```bash
git add .
git commit -m "Todo機能の作成"
```

## データベースをリセットする

Todo のデータを最初からやり直したいときは、データベースだけリセットします。

```bash
./reset-db.sh
```

このコマンドは次のことを行います。

- すべてのテーブルを作り直す
- Seeder を実行する
- Todo のサンプルデータがある場合は作り直す

## 変更を取り消したいとき

まず、変更されたファイルを確認します。

```bash
git status
```

まだ保存していない変更をすべて取り消す場合は、次のコマンドを使います。

```bash
git restore .
```

この操作をすると、保存していない変更は消えます。
不安な場合は、実行する前に変更内容を確認してください。

## この環境の方針

最初は軽く動かすため、Vite や npm の開発サーバーは起動していません。
Todo の CRUD を Laravel のルーティング、Controller、Model、Blade、SQLite で学ぶことを優先します。

JavaScript や CSS のビルドが必要になったら、あとから npm の設定を使います。

## 個人用の学習履歴

AI との会話や学習ログを残したい場合は、`logs/` フォルダに保存します。

```bash
logs/2026-06-02-learning-log.md
```

`logs/` は Git の管理対象から外しています。
そのため、履歴は自分の PC だけに残り、コミットには含まれません。
