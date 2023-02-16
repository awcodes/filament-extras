<?php

namespace Awcodes\FilamentExtras\Forms\Components;

use Closure;
use Filament\Forms\Components\Component;

class Heading extends Component
{
    use Concerns\HasColor;

    protected string|int $level = 2;

    protected string|Closure $content = '';

    protected string $view = 'filament-extras::forms.components.heading';

    final public function __construct(string|int $level)
    {
        $this->level($level);
    }

    public static function make(string|int $level): static
    {
        return app(static::class, ['level' => $level]);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->dehydrated(false);
    }

    public function level(string|int $level): static
    {
        $this->level = $level;

        return $this;
    }

    public function content(string|Closure $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getLevel(): string
    {
        return is_int($this->level) ? 'h'.$this->level : $this->level;
    }

    public function getContent(): string
    {
        return $this->evaluate($this->content);
    }
}
