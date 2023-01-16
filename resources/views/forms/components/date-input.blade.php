@php
    $id = $getId();
    $statePath = $getStatePath();
    $isRequired = $isRequired();
    $isDisabled = $isDisabled();
@endphp

<x-dynamic-component
    :component="$getFieldWrapperView()"
    :id="$id"
    :label="$getLabel()"
    :label-sr-only="$isLabelHidden()"
    :helper-text="$getHelperText()"
    :hint="$getHint()"
    :hint-action="$getHintAction()"
    :hint-color="$getHintColor()"
    :hint-icon="$getHintIcon()"
    :required="$isRequired"
    :state-path="$statePath"
>
    <input
        type="{{ $hasTime() ? 'datetime-local' : 'date' }}"
        pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}(:[0-9]{2})?"
        id="{{ $id }}"
        {!! $isAutofocused() ? 'autofocus' : null !!}
        {!! $isDisabled ? 'disabled' : null !!}
        {{ $applyStateBindingModifiers('wire:model') }}="{{ $statePath }}"
        {!! $hasSeconds() ? "step=\"1\"" : null !!}
        @if (! $isConcealed())
            {!! filled($length = $getMaxDate()) ? "maxlength=\"{$length}\"" : null !!}
            {!! filled($length = $getMinDate()) ? "minlength=\"{$length}\"" : null !!}
            {!! $isRequired ? 'required' : null !!}
        @endif
        {{
            $attributes
                ->merge($getExtraAttributes())
                ->merge($getExtraInputAttributeBag()->getAttributes())
                ->class([
                    'relative filament-extra-date-input block w-full transition duration-75 rounded-lg shadow-sm focus:border-primary-500 focus:ring-1 focus:ring-inset focus:ring-primary-500 disabled:opacity-70 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:border-primary-500',
                    'border-gray-300' => ! $errors->has($statePath),
                    'border-danger-600 ring-danger-600 dark:border-danger-400 dark:ring-danger-400' => $errors->has($statePath),
                    'text-gray-500' => $isDisabled,
                ])
        }}
    />
</x-dynamic-component>
