#!/usr/bin/env bash
set -e

HOST="127.0.0.1"
PORT="${PORT:-8000}"
URL="http://${HOST}:${PORT}"

echo "Laravel の開発環境を準備します。"

if ! command -v php >/dev/null 2>&1; then
  echo ""
  echo "エラー: PHP が見つかりません。"
  echo "Laravel を動かすには PHP が必要です。"
  echo ""
  echo "macOS の例:"
  echo "  brew install php"
  echo ""
  echo "Windows の場合:"
  echo "  PHP をインストールして、php コマンドを使えるようにしてください。"
  echo ""
  exit 1
fi

if [ ! -f vendor/autoload.php ]; then
  if ! command -v composer >/dev/null 2>&1; then
    echo ""
    echo "エラー: Composer が見つかりません。"
    echo "Laravel の部品がまだ入っていないため、Composer が必要です。"
    echo ""
    echo "macOS の例:"
    echo "  brew install composer"
    echo ""
    echo "Windows の場合:"
    echo "  Composer 公式サイトからインストーラーを入れてください。"
    echo ""
    exit 1
  fi

  echo "Laravel の部品をインストールします。少し時間がかかります。"
  composer install
elif ! command -v composer >/dev/null 2>&1; then
  echo "Composer は見つかりませんが、Laravel の部品は入っているため続行します。"
fi

if [ ! -f .env ]; then
  cp .env.example .env
  echo ".env を作成しました。"
fi

mkdir -p database
if [ ! -f database/database.sqlite ]; then
  touch database/database.sqlite
  echo "SQLite データベースを作成しました。"
fi

if ! grep -q '^APP_KEY=base64:' .env; then
  php artisan key:generate
fi

php artisan migrate --seed --force

echo ""
echo "ブラウザで ${URL} を開きます。"
echo "終了するときは、このターミナルで Ctrl + C を押してください。"
echo ""

if command -v open >/dev/null 2>&1; then
  open "${URL}" >/dev/null 2>&1 || true
elif command -v xdg-open >/dev/null 2>&1; then
  xdg-open "${URL}" >/dev/null 2>&1 || true
fi

php artisan serve --host="${HOST}" --port="${PORT}"
