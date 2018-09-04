<header class="mdc-top-app-bar" data-mdc-auto-init="MDCTopAppBar">
    <div class="mdc-top-app-bar__row">
        @component('mdc::top-app-bar.section', ['align' => 'start'])
            @component('mdc::top-app-bar.title')
                {{ $slot }}
            @endcomponent
        @endcomponent
        @isset($actions)
            @component('mdc::top-app-bar.section', ['align' => 'end'])
                {{ $actions }}
            @endcomponent
        @endisset
    </div>
</header>
