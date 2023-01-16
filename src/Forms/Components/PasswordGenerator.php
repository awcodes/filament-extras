<?php

namespace Awcodes\FilamentExtras\Forms\Components;

use Closure;
use Filament\Forms\Components\TextInput;
use Illuminate\Contracts\Support\Htmlable;

class PasswordGenerator extends TextInput
{
    protected int $passwordLength = 12;

    protected bool $hasNumbers = true;

    protected bool $hasSymbols = true;

    protected string|Htmlable|Closure|null $buttonLabel = null;

    protected string|Htmlable|Closure|null $buttonColor = null;

    protected string|Htmlable|Closure|null $buttonSize = null;

    protected bool|Closure|null $buttonIsOutlined = false;

    protected string $view = 'filament-extras::forms.components.password-generator';

    protected function setUp(): void
    {
        parent::setUp();

        $this->buttonLabel = __('filament-extras::password-generator.button_label');
        $this->buttonSize = 'md';
        $this->buttonColor = 'primary';
        $this->minLength($this->passwordLength);
    }

    public function buttonLabel(string|Htmlable|Closure|null $label): static
    {
        $this->buttonLabel = $label;

        return $this;
    }

    public function buttonColor(string|Htmlable|Closure|null $color): static
    {
        $this->buttonColor = $color;

        return $this;
    }

    public function buttonSize(string|Htmlable|Closure|null $size): static
    {
        $this->buttonSize = $size;

        return $this;
    }

    public function buttonIsOutlined(bool|Closure|null $condition): static
    {
        $this->buttonIsOutlined = $condition;

        return $this;
    }

    public function passwordLength(int $passwordLength): static
    {
        $this->passwordLength = $passwordLength;

        return $this;
    }

    public function hasNumbers(bool $hasNumbers): static
    {
        $this->hasNumbers = $hasNumbers;

        return $this;
    }

    public function hasSymbols(bool $hasSymbols): static
    {
        $this->hasSymbols = $hasSymbols;

        return $this;
    }

    public function getPasswordLength(): int
    {
        return $this->passwordLength;
    }

    public function getChars(): string
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numbers = '0123456789';
        $symbols = '!@#$%^&*_-+=';

        if ($this->hasNumbers) {
            $chars .= $numbers;
        }

        if ($this->hasSymbols) {
            $chars .= $symbols;
        }

        return $chars;
    }

    public function getButtonLabel(): string
    {
        return $this->evaluate($this->buttonLabel);
    }

    public function getButtonColor(): string
    {
        return $this->evaluate($this->buttonColor);
    }

    public function getButtonSize(): string
    {
        return $this->evaluate($this->buttonSize);
    }

    public function isButtonOutlined(): bool
    {
        return $this->evaluate($this->buttonIsOutlined);
    }
}
