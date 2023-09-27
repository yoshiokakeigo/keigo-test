@props([
    'assignment' => [],
    'objective' => [],
    'post_name' => 'now',
    'num' => 0,
    'id' => '',
])
@php
    if (!function_exists('getAssignment')) {
        function getAssignment($post_name)
        {
            return match ($post_name) {
                'now' => 'assignment',
                'min' => 'assignmentmin',
                'max' => 'assignmentmax',
                'reflection' => 'assignmentreview',
                default => '',
            };
        }
    }
@endphp

<select name="{{ getAssignment($post_name) }}" id="{{ $id }}" class="bg-gray-100 mt-5 form-assgnmnet">
    @if (!empty($objective))
        <option value="{{ $objective->assignments[$num]->id }}" selected>
            {{ $objective->assignments[$num]->name }}</option>
    @endif
    {{ $slot }}
    @foreach ($assignment as $assignments)
        <option value="{{ $assignments->id }}">{{ $assignments->name }}
        </option>
    @endforeach
</select>
<style>
    .form-assgnmnet {
        max-width: 11rem;
    }
</style>
