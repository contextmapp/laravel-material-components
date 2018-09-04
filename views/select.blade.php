<div class="mdc-select" data-mdc-auto-init="MDCSelect">
    <select
        id="{{ $id }}"
        name="{{ $field }}"
        @if($required) required @endif
        @if($disabled) disabled @endif
        class="mdc-select__native-control">
        <option value="" @empty($value) selected @endempty disabled></option>
        {{ $options }}
    </select>
    <label class="mdc-floating-label" for="{{ $id }}">{{ $label }}</label>
    <div class="mdc-line-ripple"></div>
</div>
