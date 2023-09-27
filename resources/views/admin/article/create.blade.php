<x-adminMaster title="adomindahuboard">
    <div class="p-4">
        <div class="bg-img-module bg-cover bg-no-repeat">
            <p class="absolute top-60 left-1/4 text-3xl">社内記事投稿画面</p>
            <p class="absolute right-1/4 text-gray-200 app-text-size">article</p>
        </div>
        <h2 class="text-3xl text-center font-extrabold">社内記事投稿画面</h2>
        <form action="{{ route('dashboard.store') }}" method="post" enctype="multipart/form-data"
            class="max-w-7xl m-auto w-4/5">
            @csrf
            <div class="my-20">
                <p>タイトルを入力してください<span class="text-red-600 ml-3 ">※必須</span><span
                        class="text-red-600 ml-3 ">※140字以内</span></p>
                @if ($errors->has('title'))
                    <p class="text-red-500">{{ $errors->first('title') }}</p>
                @endif
                <textarea name="title" rows="2"
                    class="focus:ring-blue-400 focus:border-blue-400 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md p-2 bg-gray-100"
                    placeholder="タイトルを入力">{{ old('title') }}</textarea>
            </div>
            <div class="my-20">
                <p>本文を入力してください</p>
                <textarea name="content" rows="7"
                    class="focus:ring-blue-400 focus:border-blue-400 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md p-2 bg-gray-100"
                    placeholder="本文を入力">{{ old('content') }}</textarea>
            </div>
            <div class="text-center">
                @if ($errors->has('images.*'))
                    <p class="text-red-500">{{ $errors->first('images.*') }}</p>
                @endif
                <x-tryce.parts.imageCreate></x-tryce.parts.imageCreate>
            </div>

            <div class="flex justify-center mt-10 mb-20">
                <div class="mx-5">
                    <x-tryce.parts.button>投稿</x-tryce.parts.button>
                </div>
                <div class="mx-5">
                    <x-tryce.parts.button-a :href="route('dashboard')" theme="secondary">キャンセル</x-tryce.parts.button-a>
                </div>
            </div>
        </form>
    </div>
</x-adminMaster>

<style>
    .bg-img-module {
        background-image: url('/images/Group 32.png');
        width: 800px;
        height: 400px;
    }

    .app-text-size {
        font-size: 120px;
    }

    .absolute-position {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
    }

    .absolute1 {
        bottom: 20%;
    }

    .absolute2 {
        bottom: 2%;
    }
</style>
