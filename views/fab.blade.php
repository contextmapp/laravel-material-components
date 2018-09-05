@isset($url)
    <a
        href="{{ $url }}"
        class="{{ $className }}"
        @unless($extended) aria-label="{{ $label }}" @endunless
        data-mdc-auto-init="MDCRipple"
    >
        <span class="mdc-fab__icon {{ $iconClass or 'material-icons' }}">{{ $icon }}</span>
        @if($extended)
            <span class="mdc-fab__label">{{ $label }}</span>
        @endif
    </a>
@else
    <button
        class="{{ $className }}"
        @unless($extended) aria-label="{{ $label }}" @endunless
        data-mdc-auto-init="MDCRipple"
    >
        <span class="mdc-fab__icon {{ $iconClass or 'material-icons' }}">{{ $icon }}</span>
        @if($extended)
            <span class="mdc-fab__label">{{ $label }}</span>
        @endif
    </button>
@endisset
