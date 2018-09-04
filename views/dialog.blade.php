<aside id="{{ $id }}"
       class="mdc-dialog"
       role="alertdialog"
       aria-labelledby="{{ $id }}-label"
       aria-describedby="{{ $id }}-description"
       data-mdc-auto-init="MDCDialog">
    <form method="POST" action="{{ $action }}" enctype="multipart/form-data" class="mdc-dialog__surface">
        @if(function_exists('csrf_field'))
            {{ csrf_field() }}
        @endif
        @isset($method)
            <input type="hidden" name="_method" value="{{ $method }}">
        @endisset
        @isset($title)
            @component('mdc::dialog.header', compact('id'))
                {{ $title }}
            @endcomponent
        @endisset
        @component('mdc::dialog.body', compact('id', 'scroll'))
            {{ $slot }}
        @endcomponent
        @isset($footer)
            @component('mdc::dialog.footer')
                {{ $footer }}
            @endcomponent
        @endisset
    </form>
    <div class="mdc-dialog__backdrop"></div>
</aside>
