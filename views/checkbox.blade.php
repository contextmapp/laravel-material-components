<div class="mdc-form-field">
    <div class="mdc-checkbox"  data-mdc-auto-init="MDCCheckbox">
        <input type="hidden" name="{{ $field }}" value="{{ $valueOff }}">
        <input
            type="checkbox"
            name="{{ $field }}"
            id="{{ $id }}"
            value="{{ $valueOn }}"
            @if($checked) checked @endif
            class="mdc-checkbox__native-control">
        <div class="mdc-checkbox__background">
            <svg class="mdc-checkbox__checkmark"
                 viewBox="0 0 24 24">
                <path class="mdc-checkbox__checkmark-path"
                      fill="none"
                      d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
            </svg>
            <div class="mdc-checkbox__mixedmark"></div>
        </div>
    </div>
    <label for="{{ $id }}">{{ $label }}</label>
</div>
@if($errors->has($dotName))
    <p
        id="{{ $id }}-validation"
        class="mdc-text-field-helper-text mdc-text-field-helper-text--validation-msg"
        data-mdc-auto-init="MDCTextFieldHelperText">
        {{ $errors->first($dotName) }}
    </p>
@endif

