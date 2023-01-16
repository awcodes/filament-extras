@php
    $level = $getLevel();
    $color = $getColor();
@endphp

<{{ $level }}
    @class([
        'font-bold tracking-tight',
        match($level) {
            'h2' => 'text-xl md:!text-2xl',
            'h3' => 'text-lg md:!text-xl',
            'h4' => 'text-default md:!text-lg',
            'h5', 'h6' => 'text-default',
        },
        match($color) {
            'primary' => 'text-primary-500',
            'secondary' => 'text-secondary-500',
            'success' => 'text-success-500',
            'warning' => 'text-warning-500',
            'danger' => 'text-danger-500',
            default => 'text-inherit'
        }
    ])
    {!! $hasHexColor() ? "style=\"color:" . $color . ";\"" : null !!}
>
        {{ $getContent() }}
</{{ $level }}>
