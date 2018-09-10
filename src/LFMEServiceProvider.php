<?php

namespace Pietrak98\LFMExtra;

use Illuminate\Support\ServiceProvider;

class LFMEServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__.'/config/lfme.php', 'lfme');

        $this->loadRoutesFrom(__DIR__.'/routes.php');

        $this->loadViewsFrom(__DIR__.'/views', 'lfme');

        $this->loadTranslationsFrom(__DIR__.'/lang', 'lfme');

    }
}