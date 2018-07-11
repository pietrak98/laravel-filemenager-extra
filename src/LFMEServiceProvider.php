<?php

namespace pietrak98\LFMExtra;

use Illuminate\Support\ServiceProvider;

class LFMEServiceProvider extends ServiceProvider
{
    public function boot()
    {
        include __DIR__ . '/routes.php';
    }
}