#!/usr/bin/env bash
set -e

echo "データベースを初期状態に戻します。"
echo "Todo のサンプルデータがある場合は、Seeder から作り直します。"
echo ""

php artisan migrate:fresh --seed

echo ""
echo "データベースをリセットしました。"
