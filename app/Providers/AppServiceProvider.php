<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * アプリ全体の設定を登録する場所です。
 *
 * 今回の Todo CRUD では特別な設定はしていませんが、
 * 共通のサービス登録が必要になったときに使います。
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * アプリで使うサービスを登録します。
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * アプリ起動時の初期設定を書きます。
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
