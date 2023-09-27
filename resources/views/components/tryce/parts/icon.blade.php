@props([
    'href' => '',
    'img' => '',
    'text' => '',
])
<a href="{{ $href }}">
    <div class="w-44">
        <img src="{{ $img }}" alt="" class="c-icon rounded-3xl">
        <p class="text-white text-center mt-4">{{ $text }}</p>
    </div>
</a>
<style>
    .c-icon {
        box-shadow: 0 10px 25px 0 rgba(0, 0, 0, .5);
    }

    .c-icon:hover {
        transform: translateY(4px);
        box-shadow: none;
    }
</style>
