<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //Model::shouldBeStrict(! $this->app->isProduction());
        // Model::preventLazyLoading();
        // Model::preventSilentlyDiscardingAttributes();
        // Model::preventAccessingMissingAttributes();

        //DB::prohibitDestructiveCommands($this->app->isProduction());
        // FreshCommand::prohibit();
        // RefreshCommand::prohibit();
        // ResetCommand::prohibit();
        // RollbackCommand::prohibit();
        // WipeCommand::prohibit();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
