<?php

namespace Awcodes\FilamentExtras;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class ExtrasServiceProvider extends PluginServiceProvider
{
    public static string $name = 'filament-extras';

    protected array $styles = [
        'plugin-filament-extras' => __DIR__.'/../resources/dist/filament-extras.css',
    ];

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)
            ->hasViews()
            ->hasTranslations();
    }
}
