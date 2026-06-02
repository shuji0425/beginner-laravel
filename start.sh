#!/usr/bin/env bash
set -e

HOST="127.0.0.1"
PORT="${PORT:-8000}"
URL="http://${HOST}:${PORT}"

echo "Laravel の開発サーバーを起動します。"
echo "ブラウザで ${URL} を開きます。"
echo "終了するときは、このターミナルで Ctrl + C を押してください。"
echo ""

if command -v open >/dev/null 2>&1; then
  open "${URL}" >/dev/null 2>&1 || true
elif command -v xdg-open >/dev/null 2>&1; then
  xdg-open "${URL}" >/dev/null 2>&1 || true
fi

php artisan serve --host="${HOST}" --port="${PORT}"
