<?php

namespace Nanuc\LaravelHumHub;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Nanuc\LaravelHumHub\Console\Commands\GetToken;
use Nanuc\LaravelTrack\Http\Middleware\TrackRequest;

class LaravelHumHubServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if($this->app->runningInConsole()) {
            $this->commands([
                GetToken::class,
            ]);
        }
    }

    public function register()
    {
        $this->app->singleton('humhub', fn() => new HumHub());
    }
}