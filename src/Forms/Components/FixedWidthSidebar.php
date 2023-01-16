<?php

namespace Awcodes\FilamentExtras\Forms\Components;

use Filament\Forms\ComponentContainer;
use Filament\Forms\Components\Component;

class FixedWidthSidebar extends Component
{
    protected array $mainSchema = [];

    protected array $sidebarSchema = [];

    protected string | int $sidebarWidth = '20rem';

    protected string | int $breakpoint = 'md';

    protected string $view = 'filament-extras::forms.components.fixed-width-sidebar';

    protected array $columnSpan = [
        'default' => 'full',
        'sm' => null,
        'md' => null,
        'lg' => null,
        'xl' => null,
        '2xl' => null,
    ];

    public static function make(): static
    {
        return new static();
    }

    public function mainSchema(array $schema): static
    {
        $this->mainSchema = $schema;

        return $this;
    }

    public function sidebarSchema(array $schema): static
    {
        $this->sidebarSchema = $schema;

        return $this;
    }

    public function sidebarWidth(string | int $width): static
    {
        $this->sidebarWidth = $width;

        return $this;
    }

    public function breakpoint(string | int $breakpoint = 'md'): static
    {
        $this->breakpoint = $breakpoint;

        return $this;
    }

    public function getMainSchema(): array
    {
        return $this->evaluate($this->mainSchema);
    }

    public function getSidebarSchema(): array
    {
        return $this->evaluate($this->sidebarSchema);
    }

    public function getSidebarWidth(): string
    {
        return is_int($this->sidebarWidth) ? $this->sidebarWidth.'px' : $this->sidebarWidth;
    }

    public function getBreakpoint(): string
    {
        $breakpoint = '';

        if (is_string($this->breakpoint)) {
            $breakpoint = match ($this->breakpoint) {
                'sm' => '640px',
                'md' => '768px',
                'lg' => '1024px',
                'xl' => '1280px',
                '2xl' => '1536px',
            };
        } elseif (is_int($this->breakpoint)) {
            $breakpoint = $this->breakpoint.'px';
        }

        return $breakpoint;
    }

    public function getChildComponentContainers(bool $withHidden = false): array
    {
        return [
            'main' => ComponentContainer::make($this->getLivewire())
                ->parentComponent($this)
                ->components($this->getMainSchema()),
            'sidebar' => ComponentContainer::make($this->getLivewire())
                ->parentComponent($this)
                ->components($this->getSidebarSchema()),
        ];
    }

    public function hasChildComponentContainer(bool $withHidden = false): bool
    {
        if ((! $withHidden) && $this->isHidden()) {
            return false;
        }

        if ($this->getMainSchema() === []) {
            return false;
        }

        if ($this->getSidebarSchema() === []) {
            return false;
        }

        return true;
    }
}
