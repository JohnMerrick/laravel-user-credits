<?php

namespace JohnMerrick\UserCredits\Providers;

use Illuminate\Support\ServiceProvider;

class UserCreditServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        if ($this->app->runningInConsole()) {

            // Export the migration
            $this->publishes([
                __DIR__ . '/../../database/migrations/create_user_credits_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_user_credits_table.php'),
                __DIR__ . '/../../database/migrations/create_user_credits_transactions_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_user_credits_transactions_table.php'),
            ], 'laravel-user-credits-migrations');
       }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
