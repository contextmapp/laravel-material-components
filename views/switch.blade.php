@component('mdc::form-field', ['id' => $id, 'align_end' => true])
    <input type="hidden" name="{{ $field }}" value="{{ $valueOff }}">
    <div class="{{ $className }}" data-mdc-auto-init="MDCSwitch">
        <div class="mdc-switch__track"></div>
        <div class="mdc-switch__thumb-underlay">
            <div class="mdc-switch__thumb">
                <input
                    type="checkbox"
                    id="{{ $id }}"
                    name="{{ $field }}"
                    value="{{ $valueOn }}"
                    class="mdc-switch__native-control"
                    role="switch"
                    @if($checked) checked @endif
                    @if($disabled) disabled @endif
                >
            </div>
        </div>
    </div>

    @slot('label')
        {{ $label }}
    @endslot
@endcomponent
@if($errors->has($dotName))
    @component('mdc::text-field.helper-text', ['id' => "{$id}-validation", 'validation' => true])
        {{ $errors->first($dotName) }}
    @endcomponent
@endif
