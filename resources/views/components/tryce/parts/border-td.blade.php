@props([
    'width' => '',
])
<td class="text-lg border border-black p-3 bg-gray-100 {{ $width }}">
    {{ $slot }}
</td>
