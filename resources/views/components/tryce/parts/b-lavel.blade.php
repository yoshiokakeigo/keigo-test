@props([
    'for' => '',
    'value' => '',
])
<label for="{{ $for }}">{{ $value }}<span class="text-red-600 ml-3 ">※必須</span><span
        class="text-red-600 ml-3 ">{{ $slot }}</span></label>
