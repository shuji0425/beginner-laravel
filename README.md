# Beginner Laravel

低スペックの PC でも触りやすい、Laravel 入門用の開発環境です。

このプロジェクトでは、Laravel の基本を学ぶために Todo リストの CRUD 処理を作っていく想定です。
データベースは SQLite を使い、初期データは Seeder で作る方針です。

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
git clone <このリポジトリのURL>
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
