<?php

namespace Awcodes\FilamentExtras\Forms\Components;

use Filament\Forms\Components\Component;

class Separator extends Component
{
    use Concerns\HasColor;

    protected string $view = 'filament-extras::forms.components.separator';

    public static function make(): static
    {
        return app(static::class);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->dehydrated(false);
    }
}
