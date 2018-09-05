@component('mdc::form-field', compact('id'))
    <div class="mdc-radio" data-mdc-auto-init="MDCRadio">
        <input
            class="mdc-radio__native-control"
            type="radio"
            id="{{ $id }}"
            name="{{ $field }}"
            value="{{ $value }}"
            aria-describedby="{{ $id }}-validation"
            aria-controls="{{ $id }}-validation"
            @if($checked) checked @endif
        >
        <div class="mdc-radio__background">
            <div class="mdc-radio__outer-circle"></div>
            <div class="mdc-radio__inner-circle"></div>
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
