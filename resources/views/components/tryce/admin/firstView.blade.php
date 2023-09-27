@php
    $user = Auth::user();
@endphp

<div class="bg-heder-img bg-cover bg-no-repeat w-auto relative">
    <div class="absolute top-28 bg-center w-4/5">
        <p class="text-white text-lg mb-4 ml-10">管理者様、おかえりなさい。</p>
        <div class="bg-gray-800 px-10 h-72 bg-opacity-50 flex gap-20 justify-center items-center rounded-2xl w-full">
            <section class="splide w-full" id="auto-splide-scope" aria-label="Splideの基本的なHTML">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide"><x-tryce.parts.icon img='/images/admin.Group 6.png' :href="route('team.index')"
                                text='チーム作成' /></li>
                        <li class="splide__slide"><x-tryce.parts.icon img='/images/admin.Group 4.png' :href="route('month.index')"
                                text='月間作成' /></li>
                        <li class="splide__slide"><x-tryce.parts.icon img='/images/admin.Group 3.png' :href="route('curriculum.index')"
                                text='カリキュラム作成' /></li>
                        <li class="splide__slide"><x-tryce.parts.icon img='/images/admin.Group 2.png' :href="route('admin.objective.index')"
                                text='月間目標' /></li>
                        <li class="splide__slide"><x-tryce.parts.icon img='/images/admin.Group 5.png' :href="route('personal.index')"
                                text='個人ページ' /></li>
                        <li class="splide__slide"><x-tryce.parts.icon img='/images/admin.Group 7.png' :href="route('dashboard.create')"
                                text='社内記事投稿' /></li>
                    </ul>
                </div>
            </section>
        </div>
    </div>
</div>

<style>
    .splide {}

    .bg-heder-img {
        background-image: url('/images/Group 62.png');
        height: 500px;
    }

    .bg-center {
        left: 50%;
        transform: translateX(-50%);
        -webkit-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
    }
</style>
