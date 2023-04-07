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

    <div x-data="{
        state: $wire.entangle('{{ $statePath }}', {defer: true}),
        generatePassword: function() {
            let chars = '{{ $getChars() }}';
            let password = '';
            for (let i = 0; i < {{ $getPasswordLength() }}; i++) {
                password += chars.charAt(Math.floor(Math.random() * chars.length));
            }
            this.state = password;
        }
    }">
        <div
            {{ $attributes
                ->merge($getExtraAttributes())
                ->class([
                    'flex items-center space-x-2 group filament-forms-text-input-component'
                ])
            }}
        >
            <div class="flex-1">
                <input
                    type="text"
                    id="{{ $id }}"
                    x-model="state"
                    {!! ($placeholder = $getPlaceholder()) ? "placeholder=\"{$placeholder}\"" : null !!}
                    @if (! $isConcealed())
                        {!! filled($length = $getMaxLength()) ? "maxlength=\"{$length}\"" : null !!}
                        {!! filled($length = $getMinLength()) ? "minlength=\"{$length}\"" : null !!}
                        {!! $isRequired ? 'required' : null !!}
                    @endif
                    {{ $getExtraInputAttributeBag()
                        ->merge()
                        ->class([
                            'relative filament-extra-date-input block w-full transition duration-75 rounded-lg shadow-sm focus:border-primary-500 focus:ring-1 focus:ring-inset focus:ring-primary-500 disabled:opacity-70 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:border-primary-500',
                            'border-gray-300' => ! $errors->has($statePath),
                            'border-danger-600 ring-danger-600 dark:border-danger-400 dark:ring-danger-400' => $errors->has($statePath),
                            'text-gray-500' => $isDisabled,
                        ]),
                    }}
                />
            </div>
            <div>
                <x-filament::button
                    color="{{ $getButtonColor() }}"
                    size="{{ $getButtonSize() }}"
                    outlined="{{ $isButtonOutlined() }}"
                    type="button"
                    x-on:click="generatePassword()"
                >
                    {{ $getButtonLabel() }}
                </x-filament::button>
            </div>
        </div>
    </div>
</x-dynamic-component>
