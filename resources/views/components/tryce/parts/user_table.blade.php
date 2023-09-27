@props([
    'value' => '',
])
<tr>
    <td class="text-right px-2 border-r-4 border-blue-500 w-1/4">
        {{ $value }}
    </td>
    <td class="px-5">
        {{ $slot }}
    </td>
</tr>
