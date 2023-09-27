@props([
    'images' => [],
])
@if (count($images) > 0)
    <section class="splide" aria-label="Splideの基本的なHTML" id="splide-scope">
        <div class="splide__track">
            <ul class="splide__list">
                @foreach ($images as $image)
                    <li class="splide__slide w-10">
                        <img alt="{{ $image->name }}" src="{{ asset('storage/images/' . $image->name) }}"
                            class="object-fit max-h-80 mx-auto">
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@else
    <section class="splide" aria-label="Splideの基本的なHTML" id="splide-scope">
        <div class="splide__track">
            <ul class="splide__list">
                <li class="splide__slide w-10">
                    <img alt="no image" src="/images/noimage-1-760x460.png">
                </li>
            </ul>
        </div>
    </section>
@endif
