@if($type === 'link')
    <a
        href="{{ $url }}"
        class="mdc-button {{ $className }}"
        data-mdc-auto-init="MDCRipple">
        @isset($icon)
            <i class="mdc-button__icon {{ $iconClass or 'material-icons' }}" aria-hidden="true">{{ $icon }}</i>
        @endisset
        {{ $label }}
    </a>
@else
    <button
        type="{{ $type }}"
        @isset($method) name="_method" value="{{ $method }}" @endisset
        @isset($form) form="{{ $form }}" @endisset
        class="mdc-button {{ $className }}"
        data-mdc-auto-init="MDCRipple">
        @isset($icon)
            <i class="mdc-button__icon {{ $iconClass or 'material-icons' }}" aria-hidden="true">{{ $icon }}</i>
        @endisset
        {{ $label }}
    </button>
@endif
