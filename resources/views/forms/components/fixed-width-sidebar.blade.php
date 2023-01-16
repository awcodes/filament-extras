<style>
    @media (min-width: {{ $getBreakpoint() }}) {
        .filament-extras-fixed-sidebar__wrapper {
            flex-direction: row;
            flex-wrap: nowrap;
        }

        .filament-extras-fixed-sidebar__sidebar {
            width: {{ $getSidebarWidth() }};
        }
    }
</style>

<div {{ $attributes->merge(['class' => 'filament-extras-fixed-sidebar']) }}>
    <div class="filament-extras-fixed-sidebar__wrapper flex gap-6 flex-col flex-wrap">
        <section aria-label="Main content" class="filament-extras-fixed-sidebar__main flex-1">
            {{ $getChildComponentContainer('main') }}
        </section>
        <section aria-label="Secondary content" class="filament-extras-fixed-sidebar__sidebar w-full">
            {{ $getChildComponentContainer('sidebar') }}
        </section>
    </div>
</div>
