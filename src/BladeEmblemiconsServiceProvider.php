<?php

declare(strict_types=1);

namespace Codeat3\BladeEmblemicons;

use BladeUI\Icons\Factory;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;

final class BladeEmblemiconsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerConfig();

        $this->callAfterResolving(Factory::class, function (Factory $factory, Container $container) {
            $config = $container->make('config')->get('blade-emblemicons', []);

            $factory->add('emblem-icons', array_merge(['path' => __DIR__.'/../resources/svg'], $config));
        });
    }

    private function registerConfig(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/blade-emblemicons.php', 'blade-emblemicons');
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/svg' => public_path('vendor/blade-emblemicons'),
            ], 'blade-emblemicons');

            $this->publishes([
                __DIR__.'/../config/blade-emblemicons.php' => $this->app->configPath('blade-emblemicons.php'),
            ], 'blade-emblemicons-config');
        }
    }
}
