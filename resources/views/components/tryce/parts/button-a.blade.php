@props([
    'href' => '',
    'theme' => 'primary',
])
@php
    if (!function_exists('getThemeClassForButtonA')) {
        function getThemeClassForButtonA($theme)
        {
            return match ($theme) {
                'primary' => 'text-white bg-blue-500 hover:shadow-none hover:translate-y-1',
                'secondary' => 'text-white bg-red-500 hover:shadow-none hover:translate-y-1',
                default => '',
            };
        }
    }
@endphp
<a href="{{ $href }}" style="min-width :120px;"
    class="
    inline-flex justify-center
    py-2 px-4
    border border-transparent
    shadow-lg
    text-sm
    font-medium
    rounded-lg
    focus:outline-none focus:ring-2 focus:ring-offset-2 {{ getThemeClassForButtonA($theme) }}">
    {{ $slot }}
</a>
