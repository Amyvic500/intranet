<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        view()->composer('*', \App\Http\ViewComposers\MessageComposer::class);
    }

    public function register(): void
    {
        //
    }
}
