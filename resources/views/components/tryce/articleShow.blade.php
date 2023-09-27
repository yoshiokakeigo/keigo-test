@props([
    'article' => [],
])
<article>
    <div class="relative z-10 mt-10">
        <div class="bg-img-module bg-cover bg-no-repeat">
            <p class="absolute top-36 left-1/3 text-3xl">新着情報</p>
            <p class="absolute -top-10 right-56 text-gray-200 app-text-size">news</p>
        </div>
    </div>
</article>
<section class="relative -top-20 z-20 bg-opacity-95 mx-16 px-32
 py-20 bg-white">
    <div class="flex gap-48">
        <div>
            <p class="text-3xl">{{ $article->created_at->format('20y.m.d') }}</p>
        </div>
        <div>
            <p class="text-2xl px-6 text-white rounded-2xl article-title inline-block mb-10">{{ $article->title }}</p>
            <p>{{ $article->content }}</p>
        </div>
    </div>
    <x-tryce.parts.showImage :images="$article->images" />
</section>
<div class="back-monument w-full h-72 absolute -bottom-60"></div>
<style>
    .bg-img-module {
        background-image: url('/images/Group 32.png');
        width: 800px;
        height: 400px;
    }

    .app-text-size {
        font-size: 200px;
    }

    .article-title {
        background-color: #1CC9D4;
    }

    .back-monument {
        background-image: url('/images/Vector 6.png');
    }
</style>
