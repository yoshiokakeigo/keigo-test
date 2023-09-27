@php
    $user = Auth::user();
@endphp

<div class="bg-heder-img bg-cover bg-no-repeat w-auto relative">
    <div class="absolute top-28 bg-center">
        @auth
            <p class="text-white text-lg mb-4 ml-10">{{ $user->name }}さん、おかえりなさい。</p>
        @endauth
        @guest
            <p class="text-white text-lg mb-4 ml-10">ゲストさん、ようこそ。</p>
        @endguest
        <div class="bg-gray-800 px-36 h-72 bg-opacity-50 flex gap-20 justify-center items-center rounded-2xl">
            <x-tryce.parts.icon img='/images/Group 5.png' :href="route('register')" text='新規作成アカウント' />
            <x-tryce.parts.icon img='/images/Group 4.png' href='#' text='カリキュラム生共有' />
            @auth
                <x-tryce.parts.icon img='/images/Group 3.png' :href="route('objective.show', ['id' => $user->id])" text='月間目標' />
            @endauth
            @guest
                <x-tryce.parts.icon img='/images/Group 3.png' :href="route('login')" text='月間目標' />
            @endguest
            <x-tryce.parts.icon img='/images/Group 2.png' :href="route('admin.login')" text='管理者専用' />
        </div>
    </div>
</div>

<style>
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
