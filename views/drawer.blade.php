<aside
    class="mdc-drawer mdc-drawer--{{ $type }} @isset($open) mdc-drawer--open @endisset "
    id="{{ $id }}"
    data-mdc-auto-init="MDC{{ ucfirst($type) }}Drawer"
>
    <nav class="mdc-drawer__drawer">
        @isset($header)
            @component('mdc::drawer.header')
                {{ $header }}
            @endcomponent
        @else
            <div class="mdc-drawer__toolbar-spacer"></div>
        @endisset
        @component('mdc::drawer.content')
            {{ $slot }}
        @endcomponent
    </nav>
</aside>
