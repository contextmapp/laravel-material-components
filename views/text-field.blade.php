<div class="mdc-text-field {{ $className }}" data-mdc-auto-init="MDCTextField">
    @if(isset($icon) && $iconPlacement === 'leading')
        <i class="mdc-text-field__icon {{ $iconClass or 'material-icons' }}" tabindex="0" role="button">{{ $icon }}</i>
    @endif
    @if($variant === 'textarea')
    <textarea
        id="{{ $id }}"
        name="{{ $field }}"
        aria-controls="{{ $id }}-validation"
        aria-describedby="{{ $id }}-validation"
        @if($required) required @endif
        @if($autofocus) autofocus @endif
        @if($disabled) disabled @endif
        class="mdc-text-field__input">{{ $value }}</textarea>
    @else
    <input
        type="{{ $type }}"
        id="{{ $id }}"
        name="{{ $field }}"
        value="{{ $value }}"
        aria-controls="{{ $id }}-validation"
        aria-describedby="{{ $id }}-validation"
        @if($variant === 'fullwidth') placeholder="{{ $label }}" @endif
        @if($required) required @endif
        @if($autofocus) autofocus @endif
        @if($disabled) disabled @endif
        @isset($accept) accept="{{ $accept }}" @endisset
        class="mdc-text-field__input">
    @endif
    @if($variant !== 'fullwidth')
    <label for="{{ $id }}" class="mdc-floating-label @if($float) mdc-floating-label--float-above @endif ">
        {{ $label }}
    </label>
    @endif
    @if(isset($icon) && $iconPlacement === 'trailing')
        <i class="mdc-text-field__icon {{ $iconClass or 'material-icons' }}" tabindex="0" role="button">{{ $icon }}</i>
    @endif
    @if($variant === 'outlined')
        <div class="mdc-notched-outline">
            <svg>
                <path class="mdc-notched-outline__path"/>
            </svg>
        </div>
        <div class="mdc-notched-outline__idle"></div>
    @elseif($variant !== 'textarea')
        <div class="mdc-line-ripple"></div>
    @endif
</div>
@isset($help)
    <p class="mdc-text-field-helper-text mdc-text-field-helper-text--persistent">{{ $help }}</p>
@endisset
@if($errors->has($dotName))
    <p
        id="{{ $id }}-validation"
        class="mdc-text-field-helper-text mdc-text-field-helper-text--persistent mdc-text-field-helper-text--validation-msg">
        {{ $errors->first($dotName) }}
    </p>
@endif
