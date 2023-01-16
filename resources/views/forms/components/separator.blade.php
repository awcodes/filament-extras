@php
    $color = $getColor();
@endphp

<hr
    @class([
        'my-2 filament-extras-separator',
        match($color) {
            'primary' => 'border-primary-300',
            'secondary' => 'border-secondary-300',
            'success' => 'border-success-300',
            'warning' => 'border-warning-300',
            'danger' => 'border-danger-300',
            default => 'border-gray-300 dark:border-gray-700'
        }
    ])
    {!! $hasHexColor() ? "style=\"border-color:" . $color . ";\"" : null !!}
/>
