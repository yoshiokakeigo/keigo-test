@props([
    'images' => [],
])

@if (count($images) > 0)
    <img alt="{{ $images[0]->name }}" class="max-w-sm object-fit max-h-60"
        src="{{ asset('storage/images/' . $images[0]->name) }}">
@else
    <img src="/images/noimage-1-760x460.png" class="max-w-sm">
@endif
