<?php

namespace Awcodes\FilamentExtras;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class FilamentExtrasServiceProvider extends PluginServiceProvider
{
    public static string $name = 'filament-extras';

    protected array $resources = [
        // CustomResource::class,
    ];

    protected array $pages = [
        // CustomPage::class,
    ];

    protected array $widgets = [
        // CustomWidget::class,
    ];

    protected array $styles = [
        'plugin-filament-extras' => __DIR__.'/../resources/dist/filament-extras.css',
    ];

    protected array $scripts = [
        'plugin-filament-extras' => __DIR__.'/../resources/dist/filament-extras.js',
    ];

    // protected array $beforeCoreScripts = [
    //     'plugin-filament-extras' => __DIR__ . '/../resources/dist/filament-extras.js',
    // ];

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name);
    }
}
