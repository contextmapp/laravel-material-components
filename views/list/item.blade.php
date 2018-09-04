<{{ $element }}
    class="{{ $className }}"
    @isset($url) href="{{ $url }}" @endisset
>
@isset($graphic)
    {{ $graphic }}
@endisset
{{ $slot }}
@isset($meta)
    {{ $meta }}
@endisset
</{{ $element }}>
