<header class="mdc-toolbar" data-mdc-auto-init="MDCToolbar">
    <div class="mdc-toolbar__row">
        @component('mdc::toolbar.section', ['align' => 'start'])
            @component('mdc::toolbar.title')
                {{ $slot }}
            @endcomponent
        @endcomponent

        @isset($actions)
            @component('mdc::toolbar.section', ['align' => 'end', 'shrink' => true])
                {{ $actions }}
            @endcomponent
        @endisset
    </div>
</header>
